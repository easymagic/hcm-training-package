<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewAssessmentCandidateV2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_assessment_candidate_v2s', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('interview_assessment_id')->nullable();
            $table->string('score')->nullable();
            $table->integer('candidate_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_assessment_candidate_v2s');
    }
}
