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
        Schema::create('lguB1bSummarydata', function (Blueprint $table) {
            $table->id();
            $table->string('D1')->nullable();
            $table->string('D2')->nullable();
            $table->string('D3')->nullable();
            $table->string('D4')->nullable();
            $table->string('D5')->nullable();
            $table->string('grandtotal')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->date('dateMonitoring')->nullable();
            $table->string('periodCovereda')->nullable();
            $table->unsignedBigInteger('barangay_id')->nullable();
            $table->unsignedBigInteger('municipal_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('MellpiproLGUB1bSummaryTracking', function (Blueprint $table) {
            $table->id();
            $table->string('D1')->nullable();
            $table->string('D2')->nullable();
            $table->string('D3')->nullable();
            $table->string('D4')->nullable();
            $table->string('D5')->nullable();
            $table->string('grandtotal')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->date('dateMonitoring')->nullable();
            $table->string('periodCovereda')->nullable();
            $table->unsignedBigInteger('barangay_id')->nullable();
            $table->unsignedBigInteger('municipal_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
