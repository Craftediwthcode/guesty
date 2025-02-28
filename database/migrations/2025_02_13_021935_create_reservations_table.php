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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->json('integration')->nullable();
            $table->string('confirmation_code')->nullable();
            $table->string('account_id')->nullable();
            $table->string('guest_id')->nullable();
            $table->string('listing_id')->nullable();
            $table->json('listing')->nullable();
            $table->json('guest')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->json('accounting')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
