<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KpiAgreementMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('kpi_agreement',function(Blueprint $blueprint){
	    	$blueprint->increments('id');
	    	$blueprint->integer('user_id')->nullable();
	    	$blueprint->integer('kpi_interval_id')->nullable();
	    	$blueprint->integer('status')->nullable();
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
	    Schema::dropIfExists('kpi_agreement');
    }

}
