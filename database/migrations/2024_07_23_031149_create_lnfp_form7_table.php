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
        Schema::create('lnfp_form7', function (Blueprint $table) {
            $table->id();
            $table->integer('form5_id')->nullable();
            $table->integer('lnfp_lgu_id')->nullable();
            
            // Accomplishments
            $table->text('accomplishmentA')->nullable();
            $table->text('accomplishmentB')->nullable();
            $table->text('accomplishmentC')->nullable();
            $table->text('accomplishmentD')->nullable();
            $table->text('accomplishmentE')->nullable();
            $table->text('accomplishmentF')->nullable();
            $table->text('accomplishmentG')->nullable();
            $table->text('accomplishmentH')->nullable();
            $table->text('accomplishmentI')->nullable();
            
            // Good Practices
            $table->text('goodPracA')->nullable();
            $table->text('goodPracB')->nullable();
            $table->text('goodPracC')->nullable();
            $table->text('goodPracD')->nullable();
            $table->text('goodPracE')->nullable();
            $table->text('goodPracF')->nullable();
            $table->text('goodPracG')->nullable();
            $table->text('goodPracH')->nullable();
            $table->text('goodPracI')->nullable();
            
            // Issues
            $table->text('issuesA')->nullable();
            $table->text('issuesB')->nullable();
            $table->text('issuesC')->nullable();
            $table->text('issuesD')->nullable();
            $table->text('issuesE')->nullable();
            $table->text('issuesF')->nullable();
            $table->text('issuesG')->nullable();
            $table->text('issuesH')->nullable();
            $table->text('issuesI')->nullable();
            
            // Actions
            $table->text('actionsA')->nullable();
            $table->text('actionsB')->nullable();
            $table->text('actionsC')->nullable();
            $table->text('actionsD')->nullable();
            $table->text('actionsE')->nullable();
            $table->text('actionsF')->nullable();
            $table->text('actionsG')->nullable();
            $table->text('actionsH')->nullable();
            $table->text('actionsI')->nullable();
            
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('header6')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('lnfp_form7');
    }
};
