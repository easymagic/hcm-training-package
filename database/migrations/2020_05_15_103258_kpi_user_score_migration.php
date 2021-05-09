<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KpiUserScoreMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('kpi_user_score',function(Blueprint $blueprint){

	    	$blueprint->increments('id');

	    	$blueprint->integer('user_id')->nullable();
	    	$blueprint->integer('kpi_data_id')->nullable();

	    	$blueprint->string('manager_score')->nullable();
	    	$blueprint->text('manager_comment')->nullable();

	    	$blueprint->string('user_score')->nullable();
	    	$blueprint->text('user_comment')->nullable();

	    	$blueprint->string('hr_score')->nullable();
	    	$blueprint->text('hr_comment')->nullable();

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
	    Schema::dropIfExists('kpi_user_score');
    }
}
