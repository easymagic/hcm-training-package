<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobAva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//
//	    "id":1,
//    "title":"CEO",
//    "description":"",
//    "jobdep_id":"50",
//    "updated_at":"2019-10-28 22:22:17",
//    "created_at":"2017-03-16 09:55:44"

	    Schema::create('job_ava', function (Blueprint $blueprint){

	    	$blueprint->increments('id');

	    	$blueprint->string('title')->nullable();
	    	$blueprint->string('description')->nullable();
	    	$blueprint->string('jobdep_id')->nullable();

	    	$blueprint->timestamps();

	    });


        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	    Schema::dropIfExists('job_ava');
    }

}
