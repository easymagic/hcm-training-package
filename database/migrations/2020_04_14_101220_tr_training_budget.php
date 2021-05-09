<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrTrainingBudget extends Migration
{


	private $table = 'tr_training_budget';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create($this->table, function(Blueprint $blueprint){

	    	$blueprint->increments('id');
	    	$blueprint->integer('hr_id')->nullable();
	    	$blueprint->integer('grade_id')->nullable();
	    	$blueprint->string('training_budget_name')->nullable();
	    	$blueprint->string('allocation_total')->nullable();
	    	$blueprint->string('year_of_allocation')->nullable();
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
	    Schema::dropIfExists($this->table);
    }

}
