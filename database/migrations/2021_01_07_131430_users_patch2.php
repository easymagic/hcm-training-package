<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersPatch2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //
	    Schema::table('users', function(Blueprint $blueprint){

	    	$blueprint->dropColumn('role');

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
	    Schema::table('users', function(Blueprint $blueprint){

		    $blueprint->string('role')->nullable();

	    });

    }

}
