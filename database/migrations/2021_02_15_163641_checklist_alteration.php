<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChecklistAlteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('onboarding_employee_checklists',function (Blueprint $blueprint){
            $blueprint->text('comment_employees')->nullable();
            $blueprint->text('comment_supervisor')->nullable();
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

        Schema::table('onboarding_employee_checklists',function (Blueprint $blueprint){
            $blueprint->dropColumn('comment_employees');
            $blueprint->dropColumn('comment_supervisor');
        });

    }


}
