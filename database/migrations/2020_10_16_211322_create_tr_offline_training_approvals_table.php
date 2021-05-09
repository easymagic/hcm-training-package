<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrOfflineTrainingApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_offline_training_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stage_id')->nullable();
            $table->integer('approver_id')->nullable();
            $table->text('comment')->nullable();
            $table->integer('tr_offline_training_id')->nullable();
	        $table->integer('status')->nullable();
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
        Schema::dropIfExists('tr_offline_training_approvals');
    }
}
