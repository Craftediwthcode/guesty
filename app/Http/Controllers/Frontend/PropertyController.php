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
    public function index()
    {
        $module_data = Properties::get();
        //dd($module_data);
        return view('frontend.our-locations-property', compact('module_data'));
    }
    public function show($id)
    {
        $module_data = Properties::where('uuid', $id)->first();
        return view('frontend.our-property-details', compact('module_data', 'id'));
    }
    public function fetchCalender(Request $request)
    {
        try {
            $data = Calender::where('listing_id', $request->property_id)->get();
            $module_data = $data->toArray();
            $block_refs = json_decode($module_data[0]['block_refs'], true);
            $currentMonth = Carbon::now()->startOfMonth();
            $nextMonth = Carbon::now()->addMonth()->startOfMonth();
            $html_calendar = $this->generateCalendarHtml($module_data, $block_refs, $currentMonth, $nextMonth);
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
    private function generateCalendarHtml(array $module_data, array $block_refs, Carbon $currentMonth, Carbon $nextMonth): string
    {
        $html = '<div class="row no-gutters">
            <div class="col-md-6">
                <div class="calendar calendar-first" id="calendar_first">
                    <div class="calendar_header">
                        <h2>' . $currentMonth->format('F Y') . '</h2>
                        <button class="switch-month switch-right">
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
        $html .= $this->generateCalendarDays($module_data, $block_refs, $currentMonth, $currentMonth->copy()->endOfMonth());
        $html .= '</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="calendar calendar-second" id="calendar_second">
            <div class="calendar_header">
                <button class="switch-month switch-left">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <h2>' . $nextMonth->format('F Y') . '</h2>
                <button class="switch-month switch-right">
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
        $html .= $this->generateCalendarDays($module_data, $block_refs, $nextMonth, $nextMonth->copy()->endOfMonth());
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
    private function generateCalendarDays(array $module_data, array $block_refs, Carbon $startDate, Carbon $endDate): string
    {
        $html = '';
        $today = Carbon::today()->toDateString();
        $firstDayOfWeek = $startDate->copy()->startOfMonth()->dayOfWeek;
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
            $html .= '<div class="blank"></div>';
        }
        $currentDate = $startDate->copy()->startOfMonth();
        while ($currentDate->month === $startDate->month) {
            $dateString = $currentDate->toDateString();
            $class = '';
            if ($currentDate->lt(Carbon::today())) {
                $class = 'disabled-date';
            } elseif ($dateString === $today) {
                $class = 'current-date';
            } else {
                foreach ($block_refs as $block_ref) {
                    $reservation = $block_ref['reservation'];
                    $checkIn = Carbon::parse($reservation['checkIn'])->toDateString();
                    $checkOut = Carbon::parse($reservation['checkOut'])->toDateString();
                    if ($dateString === $checkIn) {
                        $class = 'check-in-blocked red';
                    } elseif ($dateString === $checkOut) {
                        $class = 'check-out-blocked red';
                    } elseif ($dateString > $checkIn && $dateString < $checkOut) {
                        $class = 'blocked-date red';
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
    // public function fetchCalender(Request $request) 
    // {
    //     $data = Calender::where('listing_id',$request->property_id)->get();
    //     $currentMonthDate = Carbon::now()->startOfMonth()->format('F Y');
    //     $endMonthDate = Carbon::now()->endOfMonth()->format('F Y');
    //     $startDate = Carbon::now()->startOfMonth()->toDateString();
    //     $endDate = Carbon::now()->addMonth()->endOfMonth()->toDateString();
    //     $module_data = json_encode($data);
    //     dd($module_data);
    //     $html_calender = `<div class="row no-gutters">
    // 	    		    		    			<div class="col-md-6">
    // 			<div class="calendar calendar-first" id="calendar_first">
    // 				<div class="calendar_header">
    // 				    						<h2>'.$currentMonthDate.'</h2>
    // 					<button class="switch-month switch-right">
    // 					<i class="fa fa-chevron-right"></i>
    // 					</button>
    // 				</div>
    // 				<div class="calendar_weekdays">
    // 				    <div>Sun</div>
    // 					<div>Mon</div>
    // 					<div>Tue</div>
    // 					<div>Wed</div>
    // 					<div>Thu</div>
    // 					<div>Fri</div>
    // 					<div>Sat</div>
    // 				</div>
    // 				<div class="calendar_content">
    // 				    <div class="blank"></div>
    // 					<div class="blank"></div>
    // 					<div class="blank"></div>
    // 					<div class="blank"></div>
    // 					<div class="blank"></div>
    // 				    <div class="blank"></div>
    // 				    <div class="disabled-date">1 </div>
    // 					<div class="disabled-date">2 </div>
    // 				    <div class="disabled-date">3 </div>
    // 				    <div class="disabled-date">4 </div>
    // 				    <div class="disabled-date">5 </div>
    // 					<div class="disabled-date">6 </div>
    // 					<div class="disabled-date">7 </div>
    // 					<div class="disabled-date">8 </div>
    // 					<div class="disabled-date">9 </div>
    // 					<div class="disabled-date">10 </div>
    // 					<div class="disabled-date">11 </div>
    // 					<div class="disabled-date">12 </div>
    // 					<div class="disabled-date">13 </div>
    // 																	   						    <div class="disabled-date">14 </div>
    // 																	   						    <div class="disabled-date">15 </div>
    // 																	   						    <div class="disabled-date">16 </div>
    // 																	   						    <div class="disabled-date">17 </div>
    // 																	   						    <div class="disabled-date">18 </div>
    // 																	   						    <div class="disabled-date">19 </div>
    // 																	   						    <div class="disabled-date">20 </div>
    // 																	   						    <div class="disabled-date">21 </div>
    // 																	   						    <div class="disabled-date">22 </div>
    // 																	   						    <div class="disabled-date">23 </div>
    // 																	   						    <div class="disabled-date">24 </div>
    // 																	   						    <div class="disabled-date">25 </div>
    // 																	   						    <div class="disabled-date">26 </div>
    // 																	   						    <div class=" current-date">27 <span>$0</span></div>
    // 																	   						    <div class="">28 <span>$0</span></div>

    // 											<div class="blank"></div>
    // 											<div class="blank"></div>
    // 											<div class="blank"></div>
    // 											<div class="blank"></div>
    // 											<div class="blank"></div>
    // 											<div class="blank"></div>
    // 											<div class="blank"></div>
    // 											<div class="blank"></div>

    // 				</div>
    // 			</div>
    // 		</div>
    // 		<div class="col-md-6">
    // 			<div class="calendar calendar-second" id="calendar_second">
    // 				<div class="calendar_header">
    // 					<button class="switch-month switch-left">
    // 					<i class="fa fa-chevron-left"></i>
    // 					</button>
    // 					<h2>'.$endMonthDate.'</h2>
    // 					<button class="switch-month switch-right" data-date="01-02-2025">
    // 					<i class="fa fa-chevron-right"></i>
    // 					</button>
    // 				</div>
    // 				<div class="calendar_weekdays">
    // 					<div>Sun</div>
    // 					<div>Mon</div>
    // 					<div>Tue</div>
    // 					<div>Wed</div>
    // 					<div>Thu</div>
    // 					<div>Fri</div>
    // 					<div>Sat</div>

    // 				</div>
    // 				<div class="calendar_content">
    // 				 												<div class="blank"></div>
    // 																	<div class="blank"></div>
    // 																	<div class="blank"></div>
    // 																	<div class="blank"></div>
    // 																	<div class="blank"></div>
    // 																	<div class="blank"></div>
    // 																							    						<div class="">1  <span>$0</span></div>
    // 																	    						<div class="">2  <span>$0</span></div>
    // 																	    						<div class="">3  <span>$0</span></div>
    // 																	    						<div class="">4  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red">5  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">6  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">7  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">8  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">9  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">10  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">11  <span>$0</span></div>
    // 																	    						<div class=" check-in-blocked red">12  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red">13  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">14  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">15  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">16  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">17  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">18  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">19  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">20  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">21  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">22  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">23  <span>$0</span></div>
    // 																	    						<div class=" check-in-blocked red">24  <span>$0</span></div>
    // 																	    						<div class="">25  <span>$0</span></div>
    // 																	    						<div class="">26  <span>$0</span></div>
    // 																	    						<div class="">27  <span>$0</span></div>
    // 																	    						<div class="">28  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red">29  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">30  <span>$0</span></div>
    // 																	    						<div class=" check-out-blocked red check-in-blocked red">31  <span>$0</span></div>

    // 											<div class="blank"></div>

    // 											<div class="blank"></div>

    // 											<div class="blank"></div>

    // 											<div class="blank"></div>

    // 											<div class="blank"></div>

    // 										</div>
    // 			</div>
    // 		</div>
    // 				</div>`;
    //     return response()->json($data);
    // }
    public function searchReservation()
    {
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
