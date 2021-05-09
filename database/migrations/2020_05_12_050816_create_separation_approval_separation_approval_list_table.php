<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeparationApprovalSeparationApprovalListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('separation_approval_separation_approval_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('separation_approval_id');
            $table->integer('separation_approval_list_id');
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
        Schema::dropIfExists('separation_approval_separation_approval_list');
    }
}
