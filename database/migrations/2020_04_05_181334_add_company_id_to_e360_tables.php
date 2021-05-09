<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdToE360Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e360_dets', function (Blueprint $table) {
            $table->integer('company_id')->default(0);
        });
        Schema::table('e360_det_questions', function (Blueprint $table) {
            $table->integer('company_id')->default(0);
            $table->integer('user_id')->default(0);
        });
        Schema::table('e360_det_question_options', function (Blueprint $table) {
            $table->integer('company_id')->default(0);
            $table->integer('user_id')->default(0);
        });
        Schema::table('e360_evaluations', function (Blueprint $table) {
            $table->integer('company_id')->default(0);
        });
        Schema::table('e360_evaluation_details', function (Blueprint $table) {
            $table->integer('company_id')->default(0);
        });
        Schema::table('e360_measurement_periods', function (Blueprint $table) {
            $table->integer('company_id')->default(0);
            $table->integer('user_id')->default(0);
        });
        Schema::table('e360_question_categories', function (Blueprint $table) {
            $table->integer('company_id')->default(0);
        });
        Schema::table('e360_question_categories', function (Blueprint $table) {
            $table->integer('user_id')->default(0);
            $table->text('description')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e360_dets', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('e360_det_questions', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('e360_det_question_options', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('e360_evaluations', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('e360_evaluation_details', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('e360_measurement_periods', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('e360_question_categories', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('e360_question_categories', function (Blueprint $table) {
            $table->dropColumn('description');
        });
        //
    }
}
