<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmployeeChecklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("onboarding_employee_checklists",function(Blueprint $blueprint){
            $blueprint->renameColumn('commments','comments');
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
        Schema::table("onboarding_employee_checklists",function(Blueprint $blueprint){
            $blueprint->renameColumn('comments','commments');
        });
    }
}
