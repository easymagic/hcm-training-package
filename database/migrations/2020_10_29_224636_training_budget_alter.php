<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrainingBudgetAlter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tr_training_budget',function(Blueprint $blueprint){
            $blueprint->integer('dep_id')->nullable();
            $blueprint->dropColumn('grade_id');
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
        Schema::table('tr_training_budget',function(Blueprint $blueprint){
            $blueprint->dropColumn('dep_id');
            $blueprint->integer('grade_id')->nullable();
        });

    }

}
