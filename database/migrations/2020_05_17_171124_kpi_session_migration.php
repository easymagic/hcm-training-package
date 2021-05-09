<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KpiSessionMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('kpi_session',function(Blueprint $blueprint){

	    	$blueprint->increments('id');

	    	$blueprint->string('year')->nullable();
	    	$blueprint->integer('kpi_interval_id')->nullable();

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
	    Schema::dropIfExists('kpi_session');
    }
}
