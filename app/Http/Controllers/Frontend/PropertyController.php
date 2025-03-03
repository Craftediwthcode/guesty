<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Calender;

class PropertyController extends Controller
{
    /**
     * This function is used to display all the properties
     * in our locations page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $module_data = Properties::get();
        return view('frontend.our-locations-property', compact('module_data'));
    }
    /**
     * Display the details of a specific property based on its UUID.
     *
     * @param string $id The UUID of the property to display.
     * @return \Illuminate\Contracts\View\View The view showing property details.
     */
    public function show($id)
    {
        $module_data = Properties::where('uuid', $id)->first();
        return view('frontend.our-property-details', compact('module_data', 'id'));
    }
    /**
     * This function is used to fetch calendar data for a specific property.
     * It also handles the logic for switching between months.
     *
     * @param Request $request The request containing the property ID and operation (plus or minus) to perform on the calendar.
     * @return \Illuminate\Http\JsonResponse The response containing the generated HTML calendar.
     */
    public function fetchCalender(Request $request)
    {
        try {
            $data = Calender::where('listing_id', $request->property_id)->get();
            $module_data = $data->toArray();
            $currentMonth = Carbon::now()->startOfMonth();
            $nextMonth = $currentMonth->copy()->addMonth()->startOfMonth();
            if ($request->operation === 'plus') {
                $currentMonth = $currentMonth->addMonth();
                $nextMonth = $nextMonth->addMonth();
            } elseif ($request->operation === 'minus') {
                $newCurrentMonth = $currentMonth->copy()->subMonth();
                if ($newCurrentMonth->gte(Carbon::now()->startOfMonth())) {
                    $currentMonth = $newCurrentMonth;
                    $nextMonth = $currentMonth->copy()->addMonth();
                }
            }
            $html_calendar = $this->generateCalendarHtml($module_data, $currentMonth, $nextMonth);
            return response()->json(['html_calendar' => $html_calendar]);
        } catch (\Exception $e) {
            \Log::error('Fetch Calendar Error: ' . $e->getMessage());
            return response()->json(['error' => __('Something went wrong. Please try again.')], 500);
        }
    }
    /**
     * Generate HTML for the calendar.
     *
     * @param array $module_data
     * @param array $block_refs
     * @param Carbon $currentMonth
     * @param Carbon $nextMonth
     * @return string
     */
    private function generateCalendarHtml(array $module_data, Carbon $currentMonth, Carbon $nextMonth): string
    {
        $html = '<div class="row no-gutters">
            <div class="col-md-6">
                <div class="calendar calendar-first" id="calendar_first">
                    <div class="calendar_header">
                        <button class="switch-month switch-left" data-date="' . $currentMonth->copy()->subMonth()->format('Y-m-d') . '" ' . ($currentMonth->lte(Carbon::now()->startOfMonth()) ? 'disabled' : '') . '>
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <h2>' . $currentMonth->format('F Y') . '</h2>
                        <button class="switch-month switch-right" data-date="' . $currentMonth->copy()->format('Y-m-d') . '">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="calendar_weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar_content">';
        $html .= $this->generateCalendarDays($module_data, $currentMonth, $currentMonth->copy()->endOfMonth());
        $html .= '</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="calendar calendar-second" id="calendar_second">
                    <div class="calendar_header">
                        <button class="switch-month switch-left" data-date="' . $nextMonth->copy()->subMonth()->format('Y-m-d') . '" ' . ($nextMonth->lte(Carbon::now()->startOfMonth()) ? 'disabled' : '') . '>
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <h2>' . $nextMonth->format('F Y') . '</h2>
                        <button class="switch-month switch-right" data-date="' . $nextMonth->copy()->format('Y-m-d') . '">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="calendar_weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar_content">';
        $html .= $this->generateCalendarDays($module_data, $nextMonth, $nextMonth->copy()->endOfMonth());
        $html .= '</div>
                </div>
            </div>
        </div>';
        return $html;
    }
    /**
     * Generate calendar days with appropriate classes.
     *
     * @param array $module_data
     * @param array $block_refs
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return string
     */
    private function generateCalendarDays(array $module_data, Carbon $startDate, Carbon $endDate): string
    {
        $html = '';
        $firstDayOfWeek = $startDate->copy()->startOfMonth()->dayOfWeek;
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
            $html .= '<div class="blank"></div>';
        }
        $currentDate = $startDate->copy()->startOfMonth();
        while ($currentDate->lte($endDate)) {
            $dateString = $currentDate->toDateString();
            $class = '';
            if ($currentDate->lt(Carbon::today())) {
                $class = 'disabled-date';
            } elseif ($dateString === Carbon::today()->toDateString()) {
                $class = 'current-date';
            } else {
                foreach ($module_data as $data) {
                    if ($data['date'] === $dateString) {
                        $block_refs = json_decode($data['block_refs'] ?? '[]', true);
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            $block_refs = [];
                        }
                        foreach ($block_refs as $block_ref) {
                            $checkIn = Carbon::parse($block_ref['startDate'])->toDateString();
                            $checkOut = Carbon::parse($block_ref['endDate'])->toDateString();
                            if ($dateString == $checkIn) {
                                $class = 'check-in-blocked red';
                                break;
                            } elseif ($dateString == $checkOut) {
                                $class = 'check-out-blocked red';
                                break;
                            } elseif ($dateString > $checkIn && $dateString < $checkOut) {
                                $class = 'check-out-blocked red check-in-blocked red';
                                break;
                            }
                        }
                        break;
                    }
                }
            }
            $html .= '<div class="' . $class . '">' . $currentDate->day . '</div>';
            $currentDate->addDay();
        }
        $remainingDays = 7 - $currentDate->copy()->subDay()->dayOfWeek - 1;
        if ($remainingDays > 0 && $remainingDays < 7) {
            for ($i = 0; $i < $remainingDays; $i++) {
                $html .= '<div class="blank"></div>';
            }
        }

        return $html;
    }
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calenderShow(Request $request)
    {
        $data = Calender::where('listing_id', $request->property_id)->get();
        return response()->json($data);
    }
    public function createbookingReservation(Request $request)
    {
        dd($request->all());
        $token = User::find(1)->guesty_token;
        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->addMonth()->endOfMonth()->toDateString();
        $client = new Client();
        $url = "https://open-api.guesty.com/v1/reservations";
        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
            'verify' => false,
        ]);
        $res = json_decode($response->getBody(), true);
        return response()->json($res);
    }
    public function fullCalenderShow($id)
    {
        return view('frontend.full_calender', compact('id'));
    }
}
