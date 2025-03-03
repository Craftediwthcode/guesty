<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $fillable = [
        'date',
        'listing_id',
        'currency',
        'price',
        'is_base_price',
        'min_nights',
        'is_base_min_nights',
        'status',
        'blocks',
        'block_refs',
        'reservation_id',
        'reservation',
        'note',
        'cta',
        'ctd',
        'request_to_book',
        'by',
        'rules_applied',
    ];
}
