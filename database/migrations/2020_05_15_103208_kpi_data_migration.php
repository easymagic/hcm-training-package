<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KpiDataMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('kpi_data',function(Blueprint $blueprint){

	    	$blueprint->increments('id');

	    	$blueprint->integer('kpi_interval_id')->nullable();
	    	$blueprint->integer('dep_id')->nullable();
	    	$blueprint->string('type')->nullable(); //org or dep
	    	$blueprint->string('scope')->nullable(); //public or private
	    	$blueprint->text('requirement')->nullable();
	    	$blueprint->string('percentage')->nullable();

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
	    Schema::dropIfExists('kpi_data');
    }
}
