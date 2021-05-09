<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueryEscalationFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('query_escalation_flows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('num_of_reminder');
            $table->integer('created_by');
            $table->integer('company_id');
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
        Schema::dropIfExists('query_escalation_flows');
    }
}
