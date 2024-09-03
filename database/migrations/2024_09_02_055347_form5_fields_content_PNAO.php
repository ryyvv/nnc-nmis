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
        Schema::create('form5_fields_content_PNAO', function (Blueprint $table) {
            $table->id();
            $table->string('survey_id');
            $table->string('column1',255)->nullable();
            $table->string('column2',500)->nullable();
            $table->string('column3',500)->nullable();
            $table->string('column4',500)->nullable();
            $table->string('column5',500)->nullable();
            $table->string('column6',500)->nullable();
            $table->string('column7',500)->nullable();
            $table->string('column8',500)->nullable();
            $table->string('rating',500)->nullable();
            $table->string('remarks',500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form5_fields_content_PNAO');
    }
};
