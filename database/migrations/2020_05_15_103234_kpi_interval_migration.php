<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KpiIntervalMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('kpi_interval',function(Blueprint $blueprint){

	    	$blueprint->increments('id');

	    	$blueprint->integer('kpi_year_id')->nullable();
	    	$blueprint->string('interval_start')->nullable();
	    	$blueprint->string('interval_stop')->nullable();
	    	$blueprint->string('name')->nullable();

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
	    Schema::dropIfExists('kpi_interval');
    }
}
