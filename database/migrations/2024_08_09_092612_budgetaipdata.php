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
        Schema::create('mplgubrgybudgetaip' , function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('totalannualgu')->nullable();
            $table->unsignedBigInteger('totalbudgetapproved')->nullable();
            $table->unsignedBigInteger('totalfundsreleased')->nullable();
            $table->unsignedBigInteger('totalfundsspended')->nullable();

            $table->decimal('percentbudgetalloted', 5, 2)->nullable();
            $table->decimal('percentapprovedbudget_release', 5, 2)->nullable();
            $table->decimal('percentapprovedbudget_expended', 5, 2)->nullable();
            $table->integer('status');

            $table->integer('region_id')->unsigned(); 
            $table->integer('province_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned(); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('province_id')->references('id')->on('provinces'); 
            $table->foreign('region_id')->references('id')->on('regions'); 
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays'); 
            $table->timestamps();
        });

        Schema::create('mplgubrgybudgetaipdata' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status');
            $table->string('aipcode', 255)->nullable()->unique();
            $table->string('program', 255)->nullable();
            $table->string('implementing_agency', 255)->nullable();
            $table->date('startdate')->nullable();
            $table->date('completiondate')->nullable();
            $table->string('expected_output', 255)->nullable();
            $table->string('sourceoffund', 255)->nullable();
            $table->string('personel_service', 255)->nullable();
            $table->string('mooe', 255)->nullable();
            $table->string('capital_outlay', 255)->nullable();
            $table->string('direct_nutrition_specific', 255)->nullable();
            $table->string('indirect_nutrition_specific', 255)->nullable();
            $table->string('enabling_mechanism', 255)->nullable();
            $table->string('nutrition_topology_code', 255)->nullable();
            $table->string('sector', 255)->nullable();

            $table->integer('mplgubrgybudgetaip_id')->unsigned(); 
            $table->foreign('mplgubrgybudgetaip_id')->references('id')->on('mplgubrgybudgetaip'); 
           
            $table->timestamps();
        });

        Schema::create('mplgubrgybudgetaipTracking' , function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mplgubrgybudgetaip_id')->unsigned(); 
            $table->foreign('mplgubrgybudgetaip_id')->references('id')->on('mplgubrgybudgetaip');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays'); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });
 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mplgubrgybudgetaip');
        Schema::dropIfExists('mplgubrgybudgetaipdata');
        Schema::dropIfExists('mplgubrgybudgetaipTracking');
    }
};
