<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table("settings",function(Blueprint $blueprint){
//          $blueprint->unique()
            $blueprint->dropColumn('id');
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
        Schema::table("settings",function(Blueprint $blueprint){
//          $blueprint->unique()
            $blueprint->increments('id');
        });

    }
}
