<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AarHmoHospitals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            Schema::create('hmohospitals', function(Blueprint $table){
            $table->increments('id');
            $table->integer('hmo')->nullable();
            $table->string('hospital')->nullable();
            $table->string('band')->nullable();
            $table->string('category')->nullable();
            $table->string('coverage')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
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
        Schema::drop('hmohospitals');
    }
}
