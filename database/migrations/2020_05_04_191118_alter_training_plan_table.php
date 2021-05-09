<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTrainingPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::table('tr_offline_trainings', function(Blueprint $blueprint){

	    	$blueprint->integer('role_id')->nullable();
	    	$blueprint->integer('dep_id')->nullable();

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
		    $blueprint->dropColumn('dep_id');
		    $blueprint->dropColumn('role_id');
	    });

    }

}
