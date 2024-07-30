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
        Schema::create('lgubarangayreport', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('id');
            $table->bigInteger('lguprofile')->unsigned()->nullable();
            $table->foreign('LGU')->references('id')->on('LGU...')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lgubarangayreport');
    }
};
