<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\{Properties, Calender};
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\{Auth, Response, Validator};

class PropertiesController extends Controller
{
    /**
     * Display the properties index view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.properties.index');
    }
    /**
     * Handles the AJAX request to fetch property listings from the Guesty API.
     *
     * Retrieves the listings using the authenticated user's Guesty token
     * and returns a JSON response formatted for DataTables.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxTable(Request $request)
    {
        try {
            $status = $request->status;
            $home_page = $request->home_page;
            $properties = Properties::when($status !== null, function ($query) use ($status) {
                return $query->where('active', '=', $status);
            })->when($home_page !== null, function ($query) use ($home_page) {
                return $query->where('home_page_show', '=', $home_page);
            });
            $this->createProperty();
            return Datatables::of($properties)
                ->addIndexColumn()
                ->editColumn('active', function ($data) {
                    $status = filter_var($data['active'], FILTER_VALIDATE_BOOLEAN);
                    $checked = $status ? 'checked' : '';
                    $statusText = $status ? 'Active' : 'Inactive';
                    $statusClass = $status ? 'text-success' : 'text-danger';
                    return '
                    <div class="demo-inline-spacing">
                        <label class="switch switch-success">
                            <input type="checkbox" 
                                class="switch-input status-switch" 
                                ' . $checked . ' 
                                data-id="' . $data->id . '"
                                data-status="' . $status . '">
                            <span class="switch-toggle-slider">
                                <span class="switch-on">
                                    <i class="bx bx-check"></i>
                                </span>
                                <span class="switch-off">
                                    <i class="bx bx-x"></i>
                                </span>
                            </span>
                            <span class="switch-label ' . $statusClass . '">' . $statusText . '</span>
                        </label>
                    </div>';
                })
                ->editColumn('home_page_show', function ($data) {
                    $status = filter_var($data['home_page_show'], FILTER_VALIDATE_BOOLEAN);
                    $checked = $status ? 'checked' : '';
                    $statusText = $status ? 'True' : 'False';
                    $statusClass = $status ? 'text-success' : 'text-danger';
                    return '
                    <div class="demo-inline-spacing">
                        <label class="switch switch-success">
                            <input type="checkbox" 
                                class="switch-input home-status-switch" 
                                ' . $checked . ' 
                                data-id="' . $data->id . '"
                                data-status="' . $status . '">
                            <span class="switch-toggle-slider">
                                <span class="switch-on">
                                    <i class="bx bx-check"></i>
                                </span>
                                <span class="switch-off">
                                    <i class="bx bx-x"></i>
                                </span>
                            </span>
                            <span class="switch-label ' . $statusClass . '">' . $statusText . '</span>
                        </label>
                    </div>';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="true">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('properties.edit', $data->id) . '">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="' . route('properties.show', $data->uuid) . '">
                                        <i class="bx bx-show me-1"></i> View
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-uuid="' . $data->uuid . '" onclick="syncCalendar(this)"><i class="bx bx-right-arrow-alt me-1"></i>Sync Calendar</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['action', 'active', 'home_page_show'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module_data = Properties::find($id);
        return view('admin.properties.edit', compact('module_data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'seo_url' => 'required',
                'meta_title' => 'required',
                'meta_keywords' => 'required',
                'meta_description' => 'required',
            ]);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->errors()->first()]);
            }
            $properties = Properties::find($id);
            $properties->update([
                'seo_url' => $request->seo_url,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description
            ]);
            return Response::json(['success' => __('Property Updated Successfully.')]);
        } catch (\Exception $e) {
            dd($e);
            return Response::json(['error' => __('Something went wrong. Please try again.')]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $token = Auth::user()->guesty_token;
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ];
        $res = $client->request('GET', 'https://open-api.guesty.com/v1/listings/' . $id, [
            'headers' => $headers,
            'verify' => false,
        ]);
        $module_data = json_decode($res->getBody());
        return view('admin.properties.view', compact('module_data'));
    }
    /**
     * Creates or updates a property in the database.
     *
     * @param array $properties array of property data
     *
     * @return void
     */
    private function createProperty()
    {
        $token = Auth::user()->guesty_token;
        $client = new Client();
        $response = $client->request('GET', 'https://open-api.guesty.com/v1/listings', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
            'verify' => false,
        ]);
        $listings = json_decode($response->getBody(), true);
        $properties = collect($listings['results'] ?? []);
        $properties->chunk(10)->each(function ($propertyChunk) use ($token, $client) {
            foreach ($propertyChunk as $property) {
                Properties::updateOrCreate(
                    [
                        'uuid' => $property['_id'],
                    ],
                    [
                        'saas' => json_encode($property['SaaS'] ?? []),
                        'cleaning_status' => json_encode($property['cleaningStatus'] ?? []),
                        'picture' => json_encode($property['picture'] ?? []),
                        'terms' => json_encode($property['terms'] ?? []),
                        'prices' => json_encode($property['prices'] ?? []),
                        'title' => $property['title'] ?? null,
                        'public_description' => json_encode($property['publicDescription'] ?? []),
                        'private_description' => json_encode($property['privateDescription'] ?? []),
                        'pms' => json_encode($property['pms'] ?? []),
                        'sales' => json_encode($property['sales'] ?? []),
                        'receptionists_services' => json_encode($property['receptionistsServices'] ?? []),
                        'calendar_rules' => json_encode($property['calendarRules'] ?? []),
                        'type' => $property['type'] ?? null,
                        'tags' => json_encode($property['tags'] ?? []),
                        'owners' => json_encode($property['owners'] ?? []),
                        'amenities' => json_encode($property['amenities'] ?? []),
                        'amenities_not_included' => json_encode($property['amenitiesNotIncluded'] ?? []),
                        'use_account_revenue_share' => $property['useAccountRevenueShare'] ?? null,
                        'net_income_formula' => $property['netIncomeFormula'] ?? null,
                        'pictures' => json_encode($property['pictures'] ?? []),
                        'auto_reviews' => json_encode($property['autoReviews'] ?? []),
                        'commission_formula' => $property['commissionFormula'] ?? null,
                        'owner_revenue_formula' => $property['ownerRevenueFormula'] ?? null,
                        'use_account_additional_fees' => $property['useAccountAdditionalFees'] ?? null,
                        'use_account_taxes' => $property['useAccountTaxes'] ?? null,
                        'markups' => json_encode($property['markups'] ?? []),
                        'use_account_markups' => json_encode($property['useAccountMarkups'] ?? []),
                        'pre_booking' => json_encode($property['preBooking'] ?? []),
                        'nickname' => $property['nickname'] ?? null,
                        'slug' => $property['slug'] ?? null,
                        'property_type' => $property['propertyType'] ?? null,
                        'room_type' => $property['roomType'] ?? null,
                        'bedrooms' => $property['bedrooms'] ?? null,
                        'bathrooms' => $property['bathrooms'] ?? null,
                        'beds' => $property['beds'] ?? null,
                        'isListed' => $property['isListed'] ?? null,
                        'address' => json_encode($property['address'] ?? []),
                        'default_check_in_time' => $property['defaultCheckInTime'] ?? null,
                        'default_check_in_end_time' => $property['defaultCheckInEndTime'] ?? null,
                        'default_check_out_time' => $property['defaultCheckOutTime'] ?? null,
                        'integrations' => json_encode($property['integrations'] ?? []),
                        'accommodates' => $property['accommodates'] ?? null,
                        'timezone' => $property['timezone'] ?? null,
                        'account_id' => $property['accountId'] ?? null,
                        'pending_tasks' => json_encode($property['pendingTasks'] ?? []),
                        'listing_rooms' => json_encode($property['listingRooms'] ?? []),
                        'taxes' => json_encode($property['taxes'] ?? []),
                        'custom_fields' => json_encode($property['customFields'] ?? []),
                        'offered_services' => json_encode($property['offeredServices'] ?? []),
                        'occupancy_stats' => json_encode($property['occupancyStats'] ?? []),
                        'financials' => json_encode($property['financials'] ?? []),
                        'check_in_instructions' => json_encode($property['checkInInstructions'] ?? []),
                        'business_model' => json_encode($property['businessModel'] ?? []),
                        'area_square_feet' => $property['areaSquareFeet'] ?? null,
                        'minimum_age' => $property['minimumAge'] ?? null,
                        'last_activity_at' => $property['lastActivityAt'] ?? null,
                        'promotions' => json_encode($property['promotions'] ?? []),
                        'yield_management' => json_encode($property['yieldManagement'] ?? []),
                        'post_booking_service' => json_encode($property['postBookingService'] ?? []),
                        'account_taxes' => json_encode($property['accountTaxes'] ?? []),
                        'seo_url' => $property['seoUrl'] ?? null,
                        'meta_title' => $property['metaTitle'] ?? null,
                        'meta_keywords' => $property['metaKeywords'] ?? null,
                        'meta_description' => $property['metaDescription'] ?? null,
                        'home_page_show' => $property['homePageShow'] ?? 'false',
                        'guesty_status' => $property['guestyStatus'] ?? 'false',
                    ]
                );
            }
        });
    }
    /**
     * Change the status of a property.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        $data = Properties::where('id', $request->id)->first();
        $data->update(['active' => ($data->active == 'true' ? 'false' : 'true')]);
        return Response::json([
            'success' => $data->active == 'true' ? __('Property Activated Successfully.') : null,
            'error' => $data->active == 'false' ? __('Property Deactivated Successfully.') : null,
        ]);
    }
    /**
     * Toggle the home page status of a property.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeHome(Request $request)
    {
        $data = Properties::where('id', $request->id)->first();
        $data->update(['home_page_show' => ($data->home_page_show == 'true' ? 'false' : 'true')]);
        return Response::json([
            'success' => $data->active == 'true' ? __('Home Page Show Activated Successfully.') : null,
            'error' => $data->active == 'false' ? __('Home Page Show Deactivated Successfully.') : null,
        ]);
    }
    public function syncCalender(Request $request)
    {
        $token = Auth::user()->guesty_token;
        $startDate = Carbon::now()->startOfMonth()->toDateString();
        $endDate = Carbon::now()->addMonth()->endOfMonth(1)->toDateString();
        $propertyId = $request->property_id;
        $client = new Client();
        $url = "https://open-api.guesty.com/v1/availability-pricing/api/calendar/listings/{$propertyId}?startDate={$startDate}&endDate={$endDate}";
        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
            'verify' => false,
        ]);
        $calendarData = json_decode($response->getBody(), true);
        $days = $calendarData['data']['days'] ?? [];
        Collection::make($days)->chunk(10)->each(function ($chunk) use ($propertyId) {
            foreach ($chunk as $day) {
                Calender::updateOrCreate(
                    [
                        'listing_id' => $propertyId,
                        'date' => $day['date'],
                    ],
                    [
                        
                        'date' => $day['date'],
                        'currency' => $day['currency'],
                        'price' => $day['price'],
                        'is_base_price' => $day['isBasePrice'],
                        'min_nights' => $day['minNights'],
                        'is_base_min_nights' => $day['isBaseMinNights'],
                        'status' => $day['status'],
                        'blocks' => json_encode($day['blocks'] ?? []),
                        'block_refs' => json_encode($day['blockRefs'] ?? []),
                        'reservation_id' => $day['reservationId'] ?? null,
                        'reservation' => json_encode($day['reservation'] ?? []),
                        'note' => $day['note'] ?? null,
                        'cta' => $day['cta'],
                        'ctd' => $day['ctd'],
                        'request_to_book' => $day['requestToBook'],
                        'by' => json_encode($day['by'] ?? []),
                        'rules_applied' => json_encode($day['rulesApplied'] ?? []),
                    ]
                );
            }
        });
        return Response::json(['success' => 'Calendar Updated Successfully.']);
    }
}
