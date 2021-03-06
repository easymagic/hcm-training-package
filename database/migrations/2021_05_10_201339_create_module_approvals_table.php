<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_approvals', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('module_id')->nullable();
            $table->string('module')->nullable();
            $table->integer('stage_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('approver_id')->nullable();
            $table->text('comments')->nullable();


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
        Schema::dropIfExists('module_approvals');
    }
}
