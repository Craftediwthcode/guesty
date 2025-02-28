<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->json('saas')->nullable();
            $table->json('cleaning_status')->nullable();
            $table->json('picture')->nullable();
            $table->json('terms')->nullable();
            $table->json('prices')->nullable();
            $table->json('public_description')->nullable();
            $table->json('private_description')->nullable();
            $table->json('pms')->nullable();
            $table->json('sales')->nullable();
            $table->json('receptionists_services')->nullable();
            $table->json('calendar_rules')->nullable();
            $table->string('type')->nullable();
            $table->json('tags')->nullable();
            $table->json('owners')->nullable();
            $table->json('amenities')->nullable();
            $table->json('amenities_not_included')->nullable();
            $table->string('use_account_revenue_share')->nullable();
            $table->string('net_income_formula')->nullable();
            $table->string('commission_formula')->nullable();
            $table->string('owner_revenue_formula')->nullable();
            $table->string('use_account_additional_fees')->nullable();
            $table->string('use_account_taxes')->nullable();
            $table->string('markups')->nullable();
            $table->string('use_account_markups')->nullable();
            $table->enum('active', ['true', 'false'])->default('false');
            $table->json('pre_booking')->nullable();
            $table->string('nickname')->nullable();
            $table->string('slug');
            $table->string('title')->nullable();
            $table->string('property_type')->nullable();
            $table->string('room_type')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('beds')->nullable();
            $table->string('isListed')->nullable();
            $table->json('address')->nullable();
            $table->string('default_check_in_time')->nullable();
            $table->string('default_check_in_end_time')->nullable();
            $table->string('default_check_out_time')->nullable();
            $table->json('integrations')->nullable();
            $table->string('accommodates')->nullable();
            $table->string('timezone')->nullable();
            $table->json('pictures')->nullable();
            $table->string('account_id')->nullable();
            $table->json('pending_tasks')->nullable();
            $table->json('listing_rooms')->nullable();
            $table->json('taxes')->nullable();
            $table->json('custom_fields')->nullable();
            $table->json('offered_services')->nullable();
            $table->json('occupancy_stats')->nullable();
            $table->json('financials')->nullable();
            $table->json('check_in_instructions')->nullable();
            $table->json('business_model')->nullable();
            $table->string('area_square_feet')->nullable();
            $table->string('minimum_age')->nullable();
            $table->string('last_activity_at')->nullable();
            $table->json('promotions')->nullable();
            $table->json('yield_management')->nullable();
            $table->json('post_booking_service')->nullable();
            $table->json('account_taxes')->nullable();
            $table->string('seo_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->json('auto_reviews')->nullable();
            $table->enum('home_page_show', ['true', 'false'])->default('false');
            $table->enum('guesty_status', ['true', 'false'])->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
