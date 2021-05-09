<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateQueryThreadAddNumretries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('query_threads',function (Blueprint $table){
            $table->integer('num_of_reminders')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('query_threads',function (Blueprint $table){
            $table->dropColumn('num_of_reminders');
        });
        //
    }
}
