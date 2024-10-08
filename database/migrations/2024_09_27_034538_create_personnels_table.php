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
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_number')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('educationalbackground')->nullable(); 
            $table->string('degreeCourse')->nullable();
            $table->string('address')->nullable();
            $table->string('civilstatus')->nullable();
            $table->string('email')->unique();
            $table->string('cellphonenumer')->nullable();
            $table->string('telephonenumber')->nullable();
            $table->string('name_on_id')->nullable();
            $table->string('directory_type');

            $table->string('psgc_code', 10);
            $table->string('name');
            $table->string('correspondence_code')->nullable();
            $table->string('reg_code');
            $table->string('prov_code');
            $table->string('citymun_code');

            $table->timestamps();
        });


        Schema::create('naos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namegovmayor')->nullable();
            $table->string('typenao')->nullable();
            $table->string('typedesignation')->nullable();
            $table->date('datedesignation')->nullable();
            $table->string('typeappointment')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();  
              
            $table->integer('personnel_id')->unsigned(); 
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('npcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namegovmayor')->nullable();
            $table->string('typenpc')->nullable();
            $table->string('typedesignation')->nullable();
            $table->date('datedesignation')->nullable();
            $table->string('typeappointment')->nullable();
            $table->string('position')->nullable();        
            $table->string('department')->nullable();
            $table->string('dcnpcapmembership')->nullable();  
            $table->string('dcnpcapposition')->nullable();  
            $table->string('dcnpcapofficer')->nullable();  
              
            $table->integer('personnel_id')->unsigned(); 
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('bnss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barangay'); //might be unused
            $table->string('statusemployment')->nullable();
            $table->string('beneficiaryname')->nullable();
            $table->string('relationship')->nullable();
            $table->date('periodactivefrom')->nullable();
            $table->date('periodactiveto')->nullable();
            $table->date('lastupdate')->nullable();
            $table->string('bnsstatus')->nullable();   
              
            $table->integer('personnel_id')->unsigned(); 
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personels');
        Schema::dropIfExists('naos');
        Schema::dropIfExists('npcs');
        Schema::dropIfExists('bnss');

    }
};