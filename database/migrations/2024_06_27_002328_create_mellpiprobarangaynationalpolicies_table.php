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
            $table->integer('rating2a');
            $table->integer('rating2b');
            $table->integer('rating2c');
            $table->integer('rating2d');
            $table->integer('rating2e');
            $table->integer('rating2f');
            $table->integer('rating2g');
            $table->integer('rating2h');
            $table->integer('rating2i');
            $table->integer('rating2j');
            $table->integer('rating2k');
            $table->integer('rating2l');
            $table->integer('rating2m');
            $table->string('remarks2a', 255);
            $table->string('remarks2b', 255);
            $table->string('remarks2c', 255);
            $table->string('remarks2d', 255);
            $table->string('remarks2e', 255);
            $table->string('remarks2f', 255);
            $table->string('remarks2g', 255);
            $table->string('remarks2h', 255);
            $table->string('remarks2i', 255);
            $table->string('remarks2j', 255);
            $table->string('remarks2k', 255);
            $table->string('remarks2l', 255);
            $table->string('remarks2m', 255); 
            $table->string('dateMonitoring', 255); 
            $table->string('periodCovereda', 255); 
            $table->integer('status' ); 

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

        Schema::create('mpbrgynationalPoliciestracking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status'); 
            $table->integer('barangay_id')->unsigned(); 
            $table->integer('municipal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mellpiprobarangaynationalpolicies_id')->unsigned(); 
            $table->foreign('mellpiprobarangaynationalpolicies_id')->references('id')->on('mellpiprobarangaynationalpolicies');
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
        Schema::dropIfExists('mellpiprobarangaynationalpolicies');
        Schema::dropIfExists('mpbrgynationalPoliciestracking');
    }
};
