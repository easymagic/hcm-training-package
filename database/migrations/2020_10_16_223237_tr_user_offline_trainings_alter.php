<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrUserOfflineTrainingsAlter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::table('tr_user_offline_trainings', function(Blueprint $blueprint){
	    	$blueprint->string('progress')->nullable();
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
	   Schema::table('tr_user_offline_trainings', function(Blueprint $blueprint){
	   	 $blueprint->dropColumn('progress');
	   });
    }


}
