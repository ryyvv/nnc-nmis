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
            $table->string('barangay_id',20)->nullable();
            $table->string('municipal_id',20)->nullable();
            $table->string('province_id',20)->nullable();
            $table->string('region_id',20)->nullable();
            $table->string('user_id',20)->nullable();
            $table->timestamps();
        });

        Schema::create('mplgubrgyLguB1bSummarytracking', function (Blueprint $table) {
            $table->id();
            $table->integer('status'); 
            $table->string('barangay_id',20)->unsigned(); 
            $table->string('municipal_id',20)->unsigned();
            $table->string('user_id',20)->unsigned(); 
            $table->integer('mplgubrgyb1bSummary_id')->unsigned()->nullable(); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lguB1bSummarydata');
        Schema::dropIfExists('mplgubrgyLguB1bSummarytracking');
    }
};
