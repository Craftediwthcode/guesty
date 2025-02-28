<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $fillable = [
        'property_id',
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
    protected $casts = [
        'blocks' => 'array',
        'block_refs' => 'array',
        'reservation' => 'array',
        'by' => 'array',
        'rules_applied' => 'array',
    ];
    /**
     * The property that owns the Calender
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Properties::class);
    }
}
