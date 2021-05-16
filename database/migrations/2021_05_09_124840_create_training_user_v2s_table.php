<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingUserV2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_user_v2s', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('training_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('rating')->nullable();
            $table->string('feedback')->nullable();
            $table->string('document_upload')->nullable();
            $table->string('accepted')->nullable();


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
        Schema::dropIfExists('training_user_v2s');
    }
}
