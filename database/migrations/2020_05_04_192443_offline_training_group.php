<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfflineTrainingGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('tr_offline_training_group', function(Blueprint $blueprint){

	    	$blueprint->increments('id');
	    	$blueprint->integer('training_plan_id')->nullable();
	    	$blueprint->integer('group_id')->nullable();

	    	$blueprint->timestamps();


	    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	    Schema::dropIfExists('tr_offline_training_group');
    }

}
