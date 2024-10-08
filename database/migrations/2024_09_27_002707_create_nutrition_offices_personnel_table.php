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
        Schema::create('nutrition_offices_personnel', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code', 10); //may have duplicate
            $table->string('name');
            $table->string('correspondence_code')->nullable();
            $table->string('geographic_level')->nullable();
            $table->string('income_classification')->nullable();

            $table->string('nutrition_office')->nullable();
            $table->string('separate_nutrition_budget')->nullable();
            $table->string('under_what_office')->nullable();

            // P/CNAO Information
            $table->string('pcnao')->nullable();
            $table->string('pcnao_job_title')->nullable();
            $table->string('pcnao_employment_status')->nullable();
            $table->unsignedTinyInteger('pcnao_salary_grade')->nullable();
            $table->string('more_than_1_pcnao')->nullable();

            // D/CNPC Information
            $table->string('dcnpc')->nullable();
            $table->string('dcnpc_job_title')->nullable();
            $table->string('dcnpc_employment_status')->nullable();
            $table->unsignedTinyInteger('dcnpc_salary_grade')->nullable();
            $table->string('more_than_1_dcnpc')->nullable();

            // Support Staff
            $table->integer('technical_support_staff')->nullable();
            $table->integer('admin_support_staff')->nullable();
            
            // Awards and Recognition
            $table->date('nha')->nullable();
            $table->date('crown')->nullable();
            $table->date('green_banner')->nullable();
            
            // Other Awards
            $table->text('other_awards_received')->nullable();
            $table->date('other_awards_received_date')->nullable();

            // Other Information
            $table->text('remarks')->nullable();

            $table->string('reg_code');
            $table->string('prov_code');
            $table->string('citymun_code');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_offices_personnel');
    }
};