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
        Schema::create('lguB4Summarydata', function (Blueprint $table) {
            $table->id();
            $table->string('mplgubrgyb1bSummary_id')->nullable();
            $table->string('mplgubrgyb2bSummary_id')->nullable();
            $table->string('grandtotal')->nullable();
            $table->string('finding')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('status')->nullable();
            $table->date('dateMonitoring')->nullable();
            $table->string('periodCovereda')->nullable();
            $table->string('barangay_id',20)->nullable();
            $table->string('municipal_id',20)->nullable();
            $table->string('province_id',20)->nullable();
            $table->string('region_id',20)->nullable();
            $table->integer('user_id' )->nullable();
            $table->timestamps();
        });

        Schema::create('mplgubrgyLguB4Summarytracking', function (Blueprint $table) {
            $table->id();
            $table->integer('status'); 
            $table->string('barangay_id',20)->unsigned(); 
            $table->string('municipal_id',20)->unsigned();
            $table->integer('user_id')->unsigned(); 
            $table->integer('mplgubrgyb4Summary_id')->unsigned()->nullable(); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lguB4Summarydata');
        Schema::dropIfExists('mplgubrgyLguB4Summarytracking');
    }
};
