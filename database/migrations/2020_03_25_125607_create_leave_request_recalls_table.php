<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveRequestRecallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_request_recalls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leave_request_id')->default(0);
            $table->integer('recaller_id')->default(0);
            $table->date('old_date')->nullable();
            $table->date('new_date')->nullable();
            $table->text('recall_reason')->nullable();
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
        Schema::dropIfExists('leave_request_recalls');
    }
}
