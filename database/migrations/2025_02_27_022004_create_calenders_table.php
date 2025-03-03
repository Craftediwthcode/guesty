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
        Schema::create('calenders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('listing_id');
            $table->string('currency');
            $table->decimal('price', 8, 2);
            $table->boolean('is_base_price');
            $table->integer('min_nights');
            $table->boolean('is_base_min_nights');
            $table->string('status');
            $table->json('blocks')->nullable();
            $table->json('block_refs')->nullable();
            $table->string('reservation_id')->nullable();
            $table->json('reservation')->nullable();
            $table->string('note')->nullable();
            $table->boolean('cta')->default(false);
            $table->boolean('ctd')->default(false);
            $table->boolean('request_to_book')->default(false);
            $table->json('by')->nullable();
            $table->json('rules_applied')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calenders');
    }
};
