<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrUserOfflineTrainings extends Migration
{
	private $table = 'tr_user_offline_trainings';
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

	    	$blueprint->integer('training_plan_id')->nullable();
	    	$blueprint->integer('user_id')->nullable();
	    	$blueprint->integer('completed')->nullable();
		    $blueprint->integer('status')->nullable(); //rejected or accepted.
		    $blueprint->longText('reason')->nullable();
		    $blueprint->longText('progress_notes')->nullable();
	    	$blueprint->longText('feedback')->nullable();
	    	$blueprint->string('rating')->nullable();
	    	$blueprint->string('upload1')->nullable();
		    $blueprint->string('upload2')->nullable();
		    $blueprint->string('upload3')->nullable();

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
