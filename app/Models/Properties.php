<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Properties extends Model
{
    use HasSlug;
    protected $fillable = [
        'uuid',
        'slug',
        'title',
        'seo_url',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'public_description',
        'amenities',
        'pictures',
        'auto_reviews',
        'active',
        'home_page_show',
        'guesty_status',
        'saas',
        'cleaning_status',
        'picture',
        'terms',
        'prices',
        'private_description',
        'pms',
        'sales',
        'receptionists_services',
        'calendar_rules',
        'type',
        'tags',
        'owners',
        'amenities_not_included',
        'use_account_revenue_share',
        'net_income_formula',
        'commission_formula',
        'owner_revenue_formula',
        'use_account_additional_fees',
        'use_account_taxes',
        'markups',
        'use_account_markups',
        'pre_booking',
        'nickname',
        'property_type',
        'room_type',
        'bedrooms',
        'bathrooms',
        'beds',
        'isListed',
        'address',
        'default_check_in_time',
        'default_check_in_end_time',
        'default_check_out_time',
        'integrations',
        'accommodates',
        'timezone',
        'account_id',
        'pending_tasks',
        'listing_rooms',
        'taxes',
        'custom_fields',
        'offered_services',
        'occupancy_stats',
        'financials',
        'check_in_instructions',
        'business_model',
        'area_square_feet',
        'minimum_age',
        'last_activity_at',
        'promotions',
        'yield_management',
        'post_booking_service',
        'account_taxes',
    ];
     /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
