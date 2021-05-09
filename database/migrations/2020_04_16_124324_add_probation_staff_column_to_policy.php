<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProbationStaffColumnToPolicy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leave_policies', function (Blueprint $table) {
            $table->integer('probationer_applies')->default(0);
            $table->integer('uses_casual_leave')->default(0);
            $table->integer('casual_leave_length')->default(0);
        });
        Schema::table('leaves', function (Blueprint $table) {
            $table->string('marital_status')->nullable();
            $table->string('gender')->nullable();
        });
        Schema::table('payroll_policies', function (Blueprint $table) {
            $table->integer('suspension_prorates')->default(1);
            $table->integer('new_hire_prorates')->default(1);
            $table->integer('separation_prorates')->default(1);
            $table->integer('leave_spill_is_paid')->default(1);
        });
        Schema::table('leave_spills', function (Blueprint $table) {
            $table->integer('paid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leave_policies', function (Blueprint $table) {
            $table->dropColumn('probationer_applies');
            $table->dropColumn('uses_casual_leave');
            $table->dropColumn('casual_leave_length');
        });
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn('marital_status');
            $table->dropColumn('gender');
        });
        Schema::table('payroll_policies', function (Blueprint $table) {
            $table->dropColumn('suspension_prorates');
            $table->dropColumn('new_hire_prorates');
            $table->dropColumn('separation_prorates');
            $table->dropColumn('leave_spill_is_paid');
        });
        Schema::table('leave_spills', function (Blueprint $table) {
            $table->dropColumn('paid');
        });
    }
}
