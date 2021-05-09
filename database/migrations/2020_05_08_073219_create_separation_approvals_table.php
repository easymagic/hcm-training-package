<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeparationApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('separation_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('separation_id');
            $table->integer('stage_id');
            $table->integer('approver_id');
            $table->text('comments')->nullable();
            $table->integer('status')->default(0);
            $table->text('signature')->nullable();
            $table->integer('company_id')->default(0);;
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
        Schema::dropIfExists('separation_approvals');
    }
}
