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
            $table->string('1a')->nullable();
            $table->string('1b')->nullable();
            $table->string('1c')->nullable();
            $table->string('totalrating1')->nullable();
            $table->string('2a')->nullable();
            $table->string('2b')->nullable();
            $table->string('2c')->nullable();
            $table->string('2d')->nullable();
            $table->string('2e')->nullable();
            $table->string('2f')->nullable();
            $table->string('2g')->nullable();
            $table->string('2h')->nullable();
            $table->string('2i')->nullable();
            $table->string('2j')->nullable();
            $table->string('2k')->nullable();
            $table->string('2l')->nullable();
            $table->string('totalrating2')->nullable();
            $table->string('3a')->nullable();
            $table->string('3b')->nullable();
            $table->string('3c')->nullable();
            $table->string('totalrating3')->nullable();
            $table->string('4a')->nullable();
            $table->string('4b')->nullable();
            $table->string('4c')->nullable();
            $table->string('4d')->nullable();
            $table->string('4e')->nullable();
            $table->string('4f')->nullable();
            $table->string('totalrating4')->nullable();
            $table->string('5a')->nullable();
            $table->string('5b')->nullable();
            $table->string('5c')->nullable();
            $table->string('5d')->nullable();
            $table->string('5e')->nullable();
            $table->string('5f')->nullable();
            $table->string('5g')->nullable();
            $table->string('5h')->nullable();
            $table->string('totalrating5')->nullable();
            $table->string('grandtotal')->nullable();
            $table->string('remarks')->nullable();
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
