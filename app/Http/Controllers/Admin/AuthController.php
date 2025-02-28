<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use GuzzleHttp\Client;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\{Str, Carbon};
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\{Auth, Validator, Response, RateLimiter, Hash, DB, Log, Storage};

class AuthController extends Controller
{
    /**
     * Display the login form for the admin.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function submitLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        if ($this->hasTooManyLoginAttempts($request)) {
            return back()->with('error', 'Too many login attempts. Please try again later.')->withInput();
        }
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'type' => '0'])) {
            $this->clearLoginAttempts($request);
            $guestyToken  = $this->guestyLogin();
            User::where('id', Auth::id())->update(['guesty_token' => $guestyToken['access_token']]);
            return redirect()->route('dashboard')->with('success', 'Login Successfully.');
        } else {
            $this->incrementLoginAttempts($request);
            return back()->with('error', 'Invalid Credentials.')->withInput();
        }
    }

    /**
     * Authenticates with the Guesty API and retrieves an access token.
     *
     * Sends a POST request to the Guesty OAuth2 token endpoint using client credentials
     * and returns the access token as an associative array.
     * Logs an error message if the request fails.
     *
     * @return array|null Returns the access token data or null if authentication fails.
     */
    protected function guestyLogin()
    {
        $client = new Client();
        try {
            $response = $client->post('https://open-api.guesty.com/oauth2/token', [
                'form_params' => [
                    'grant_type' => env('GUESTY_GRAND_TYPE'),
                    'scope' => env('GUESTY_SCOPE'),
                    'client_secret' => env('GUESTY_CLIENT_SECRET'),
                    'client_id' => env('GUESTY_CLIENT_ID'),
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'verify' => false
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Guesty login failed: ' . $e->getMessage());
            return null;
        }
    }
    /**
     * Determine if the user has too many login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return RateLimiter::tooManyAttempts($this->throttleKey($request), 2);
    }
    /**
     * Increment the login attempts for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request));
    }
    /**
     * Clear the login attempts for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function clearLoginAttempts(Request $request)
    {
        RateLimiter::clear($this->throttleKey($request));
    }
    /**
     * Generate the rate limiting throttle key for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }
    /**
     * Log the user out of the application.
     *
     * This method will log the user out by invalidating the current session and regenerating
     * the CSRF token to ensure security. It then returns a JSON response indicating successful
     * logout.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Response::json(['success' => 'Logout Successfully.']);
    }
    /**
     * Show the form for changing the current user's password.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('admin.auth.change_password');
    }
    /**
     * Change the current user's password.
     *
     * This method will validate the current and new passwords, then update the user's
     * password in the database. If the current password does not match the user's
     * stored password, it will return a JSON response indicating an error. If the
     * new password is invalid, it will also return a JSON response with an error
     * message. If the password is successfully changed, it will log the user out,
     * invalidate the current session, and regenerate the CSRF token to ensure
     * security.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', Password::min(8)],
            'new_password'     => ['required', Password::min(8)],
            'confirm_password' => ['required', 'same:new_password'],
        ]);
        if ($validator->fails()) {
            return Response::json(['error' => $validator->errors()->first()]);
        } else {
            if (!Hash::check($request['current_password'], Auth::user()->password)) {
                return Response::json(['error' => __('Current Password did not match.')]);
            } else {
                User::where('id', Auth::user()->id)->update(['password' => Hash::make($request['new_password'])]);
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return Response::json(['success' => __('Password has been Updated Successfully.')]);
            }
        }
    }
    /**
     * Checks if the provided email is unique in the users table.
     *
     * This method retrieves the authenticated user's ID and checks if the email
     * provided in the request is unique in the `users` table, excluding the user's
     * own email if the user is authenticated. It returns a JSON response indicating
     * whether the email already exists in the database.
     *
     * @param \Illuminate\Http\Request $request The request containing the email to check.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating if the email already exists.
     */
    public function checkUnique(Request $request)
    {
        $user_id = Auth::id();
        $rules = [];
        if ($user_id) {
            $rules['email'] = 'unique:users,email,' . $user_id;
        } else {
            $rules['email'] = 'unique:users,email';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(['exists' => true]);
        } else {
            return Response::json(['exists' => false]);
        }
    }
    /**
     * Display the profile view for the current user.
     *
     * This method returns the view for the admin user profile page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showProfile()
    {
        return view('admin.auth.profile');
    }
    /**
     * Update the current user's profile information.
     *
     * This method validates the request data for the current user's profile
     * information, updates the user in the database, and returns a JSON response
     * indicating whether the update was successful.
     *
     * @param \Illuminate\Http\Request $request The request containing the user's profile information.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating if the update was successful.
     */
    public function submitProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'mobile' => 'required',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return Response::json(['error' => $validator->errors()->first()]);
        }
        $user = User::find(Auth::id());
        $image = $user->image;
        if ($request->hasFile('image')) {
            try {
                if ($image && Storage::disk('s3')->exists($image)) {
                    Storage::disk('s3')->delete($image);
                }
                $image = Helper::imageUpload($request->file('image'), 'uploads/user');
            } catch (\Exception $e) {
                return Response::json(['error' => 'Could not upload your file: ' . $e->getMessage()]);
            }
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country_code' => $request->country_code,
            'image' => $image,
        ]);
        return Response::json(['success' => __('Profile Updated Successfully')]);
    }
    /**
     * Display the forgot password form for the admin.
     *
     * This method returns the view for the admin's forgot password page,
     * allowing the admin to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showForgotForm()
    {
        return view('admin.auth.forgot_password');
    }
    /**
     * Handle the submission of the forgot password form.
     *
     * This method validates the email provided in the request and checks if a user
     * with the given email exists. If the user exists, a password reset token is
     * generated and stored in the database. A reset password email is then sent to
     * the user with a link to reset their password. If the email validation fails
     * or the user does not exist, appropriate error messages are returned.
     *
     * @param \Illuminate\Http\Request $request The request containing the email for password reset.
     * @return \Illuminate\Http\RedirectResponse Redirects back with success or error messages.
     */
    public function submitForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'The account does not exist.');
        }
        $token = Str::random(64);
        DB::table('password_reset_tokens')
            ->updateOrInsert(
                ['email' => $request->email],
                ['token' => $token, 'created_at' => Carbon::now()]
            );
        // Create an object and set $user under the 'users' key
        $data = (object) [
            'users' => $user, // Set $user under 'users' key
        ];

        // Add the reset_link directly to the 'users' object
        $data->reset_link = route('reset-password', [
            'token' => $token,
            'email' => $user->email,
        ]);
        Helper::sendMail('password_reset_link', $data, 'Password Reset Link');
        return redirect(route('admin'))->with('success', 'Reset password link has sent on the registered email id');
    }
    /**
     * Display the password reset form for the admin.
     *
     * This method returns the view for the admin's password reset page,
     * given a valid password reset token.
     *
     * @param string $token A valid password reset token.
     * @return \Illuminate\View\View
     */
    public function resetPassword($token)
    {
        // Fetch the token data from the database
        $resetToken = DB::table('password_reset_tokens')->where('token', $token)->first();

        // Check if the token doesn't exist
        if (!$resetToken) {
            return redirect()->route('admin')->with('error', 'The password reset link is invalid. Please request a new one.');
        }

        // Check if the token has expired (5 minutes)
        if (Carbon::parse($resetToken->created_at)->addMinutes(5)->isPast()) {
            return redirect()->route('admin')->with('error', 'The password reset link has expired. Please request a new one.');
        }

        // If the token is valid and not expired, show the reset password form
        return view('admin.auth.reset_password', ['token' => $token]);
    }
    /**
     * Reset the admin's password.
     *
     * This method resets the admin's password using a valid password reset token.
     *
     * @param \Illuminate\Http\Request $request A request containing the password, confirm_password, and token.
     * @return \Illuminate\Http\RedirectResponse A redirect response with success or error message.
     */
    public function resetPasswordStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $update = DB::table('password_reset_tokens')->where(['token' => $request->token])->first();
        if (!$update) {
            return back()->with('error', 'Invalid or expired reset link.');
        }
        // Update the password
        $user = User::where('email', $update->email)->first();
        if (!$user) {
            return back()->with('error', 'No user found with this email address.');
        }
        $user->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $update->email])->delete();
        return redirect()->route('admin')->with('success', 'Your password has been successfully reset.');
    }
}
