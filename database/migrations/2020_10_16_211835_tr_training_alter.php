<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrTrainingAlter extends Migration
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
//	    	$blueprint->string('type')->nullable();
		    $blueprint->string('resource_url')->nullable();
		    $blueprint->longText('enroll_instructions')->nullable();
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
//		    $blueprint->dropColumn('type');
		    $blueprint->dropColumn('resource_url');
		    $blueprint->dropColumn('enroll_instructions');
	    });
    }
}
