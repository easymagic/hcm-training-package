<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrOfflineTrainings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $table  = 'tr_offline_trainings';

    public function up()
    {
        //
	    Schema::create($this->table, function(Blueprint $blueprint){


	    	$blueprint->increments('id');

	    	$blueprint->string('name')->nullable();
	    	$blueprint->string('cost_per_head')->nullable();
		    $blueprint->integer('number_of_enrollees')->nullable();
		    $blueprint->string('grand_total')->nullable();
		    $blueprint->integer('line_manager_id')->nullable();
		    $blueprint->integer('status')->nullable();
		    $blueprint->longText('reason')->nullable();
		    $blueprint->integer('approved_by')->nullable();
		    $blueprint->integer('last_modified_by')->nullable();
		    $blueprint->string('train_start')->nullable();
		    $blueprint->string('train_stop')->nullable();
		    $blueprint->string('year_of_training')->nullable();

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
	    Schema::dropIfExists($this->table);
    }
}
