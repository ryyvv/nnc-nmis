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
        Schema::create('lguB2bSummarydata', function (Blueprint $table) {
            $table->id();
            $table->string('ch1')->nullable();
            $table->string('ch2')->nullable();
            $table->string('ch3')->nullable();
            $table->string('ch4')->nullable();
            $table->string('ch5')->nullable();
            $table->string('ch6')->nullable();
            $table->string('ch7')->nullable();
            $table->string('ch8')->nullable();
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

        Schema::create('mplgubrgyLguB2bSummarytracking', function (Blueprint $table) {
            $table->id();
            $table->integer('status'); 
            $table->string('barangay_id',20)->unsigned(); 
            $table->string('municipal_id',20)->unsigned();
            $table->string('user_id',20)->unsigned(); 
            $table->integer('mplgubrgyb2bSummary_id')->unsigned()->nullable(); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lguB2bSummarydata');
        Schema::dropIfExists('mplgubrgyLguB2bSummarytracking');
    }
};
