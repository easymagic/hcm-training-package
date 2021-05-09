<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrainingPlanAlter2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('tr_offline_trainings',function (Blueprint $blueprint){
	         $blueprint->string('type')->default('offline');
	         $blueprint->integer('remote_id')->nullable();
//	         $blueprint->integer('dep_id')->nullable();



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
	    Schema::table('tr_offline_trainings', function(Blueprint $blueprint){
	    	$blueprint->dropColumn('type');
	    	$blueprint->dropColumn('remote_id');
	    });

    }
}
