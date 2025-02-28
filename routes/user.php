<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    PropertyController
};
//authenticate admin
Route::get('/property', [PropertyController::class, 'index'])->name('property');
Route::get('/property/{uuid}', [PropertyController::class, 'show'])->name('property.show');
Route::post('/property/calender', [PropertyController::class, 'fetchCalender'])->name('property.fetchCalender');
Route::get('/fullcalender/{property_id}', [PropertyController::class, 'fullCalenderShow'])->name('full_calender');
