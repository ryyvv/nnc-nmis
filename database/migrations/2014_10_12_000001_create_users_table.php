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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Firstname');
            $table->string('Middlename');
            $table->string('Lastname');
            $table->string('Region');
            $table->string('Province');
            $table->string('city_municipal');
            $table->string('agency_office_lgu');
            $table->string('Division_unit');
            $table->string('barangay');
            $table->string('designation');
            $table->string('role'); //user role
            $table->string('status'); //approved or pending 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            //
            // $table->tinyInteger("role")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
