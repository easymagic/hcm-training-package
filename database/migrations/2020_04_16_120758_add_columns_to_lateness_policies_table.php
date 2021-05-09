<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToLatenessPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lateness_policies', function (Blueprint $table) {
            $table->string('specific_salary_component_type_id')->default('1');
            $table->string('payroll')->default('all');//normal,attendance,all
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lateness_policies', function (Blueprint $table) {
            $table->dropColumn('specific_salary_component_type_id');
            $table->dropColumn('payroll');
        });
    }
}
