<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProbationPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probation_policies', function (Blueprint $table) {
            $table->increments('id');
            $datas=['probation_period','probation_reminder','automatic_probation','notify_roles'];
            foreach($datas as $data){
                $table->string($data,20);
            }
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
        Schema::dropIfExists('probation_policies');
    }
}
