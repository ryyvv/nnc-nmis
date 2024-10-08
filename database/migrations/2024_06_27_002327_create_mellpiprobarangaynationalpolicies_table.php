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
        Schema::create('mellpiprobarangaynationalpolicies', function (Blueprint $table) {
            $table->id(); 
            $table->integer('rating2a')->nullable();
            $table->integer('rating2b')->nullable();
            $table->integer('rating2c')->nullable();
            $table->integer('rating2d')->nullable();
            $table->integer('rating2e')->nullable();
            $table->integer('rating2f')->nullable();
            $table->integer('rating2g')->nullable();
            $table->integer('rating2h')->nullable();
            $table->integer('rating2i')->nullable();
            $table->integer('rating2j')->nullable();
            $table->integer('rating2k')->nullable();
            $table->integer('rating2l')->nullable();
            $table->integer('rating2m')->nullable();
            $table->string('remarks2a', 255)->nullable();
            $table->string('remarks2b', 255)->nullable();
            $table->string('remarks2c', 255)->nullable();
            $table->string('remarks2d', 255)->nullable();
            $table->string('remarks2e', 255)->nullable();
            $table->string('remarks2f', 255)->nullable();
            $table->string('remarks2g', 255)->nullable();
            $table->string('remarks2h', 255)->nullable();
            $table->string('remarks2i', 255)->nullable();
            $table->string('remarks2j', 255)->nullable();
            $table->string('remarks2k', 255)->nullable();
            $table->string('remarks2l', 255)->nullable();
            $table->string('remarks2m', 255)->nullable(); 
            $table->string('dateMonitoring', 255)->nullable(); 
            $table->string('periodCovereda', 255)->nullable(); 
            $table->integer('status' ); 

            $table->string('region_id', 20)->unsigned(); 
            $table->string('province_id', 20)->unsigned(); 
            $table->string('municipal_id', 20)->unsigned(); 
            $table->string('barangay_id', 20)->unsigned(); 
            $table->integer('user_id')->unsigned()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });

        Schema::create('mpbrgynationalPoliciestracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->string('barangay_id',20)->unsigned(); 
            $table->string('municipal_id',20)->unsigned();
            $table->integer('user_id')->unsigned()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('mellpiprobarangaynationalpolicies_id')->unsigned(); 
            $table->foreign('mellpiprobarangaynationalpolicies_id')->references('id')->on('mellpiprobarangaynationalpolicies')->onDelete('cascade');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mellpiprobarangaynationalpolicies');
        Schema::dropIfExists('mpbrgynationalPoliciestracking');
    }
};
