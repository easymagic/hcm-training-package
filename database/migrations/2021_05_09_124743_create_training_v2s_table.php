<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingV2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_v2s', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('year')->nullable();
            $table->string('cost')->nullable();
            $table->string('is_free')->nullable();
            $table->string('type')->nullable();
            $table->string('resource_link')->nullable();
            $table->string('approved')->nullable();
            $table->string('start_date')->nullable();
            $table->string('stop_date')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('department_id')->nullable();

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
        Schema::dropIfExists('training_v2s');
    }
}
