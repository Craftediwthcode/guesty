<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'uuid',
        'integration',
        'confirmation_code',
        'account_id',
        'guest_id',
        'listing_id',
        'listing',
        'guest',
        'check_in',
        'check_out',
        'accounting'
    ];
}
