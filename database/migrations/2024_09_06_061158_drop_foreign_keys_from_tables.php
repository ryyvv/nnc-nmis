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

        Schema::table('lguprofilebarangay', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('barangaytracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgychangeNS', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgychangeNStracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgydiscussionquestion', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgydiscussionquestiontracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgygovernance', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgygovernancetracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgylncmanagement', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgylncmanagementtracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgyvisionmissions', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgyvisionmissionstracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mellpiprobarangaynationalpolicies', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mpbrgynationalPoliciestracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgynutritionservice', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });

        Schema::table('mplgubrgynutritionservicetracking', function (Blueprint $table) {
            $table->dropForeign(['municipal_id']);
            $table->dropForeign(['barangay_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lguprofilebarangay', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('barangaytracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgychangeNS', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgychangeNStracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgydiscussionquestion', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgydiscussionquestiontracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgygovernance', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgygovernancetracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgylncmanagement', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgylncmanagementtracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });
        Schema::table('mplgubrgyvisionmissions', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgyvisionmissionstracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mellpiprobarangaynationalpolicies', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mpbrgynationalPoliciestracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgynutritionservice', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });

        Schema::table('mplgubrgynutritionservicetracking', function (Blueprint $table) {
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('barangay_id')->references('id')->on('barangays');
        });
    }
};