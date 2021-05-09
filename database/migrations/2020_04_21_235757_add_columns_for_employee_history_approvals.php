<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsForEmployeeHistoryApprovals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emp_academics', function (Blueprint $table) {

            $table->integer('last_change_approved')->default(1);
            $table->integer('last_change_approved_by')->default(0);
            $table->timestamp('last_change_approved_on')->nullable();
            $table->integer('company_id')->default(0);
        });
        Schema::table('emp_histories', function (Blueprint $table) {

            $table->integer('last_change_approved')->default(1);
            $table->integer('last_change_approved_by')->default(0);
            $table->timestamp('last_change_approved_on')->nullable();
            $table->integer('company_id')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emp_academics', function (Blueprint $table) {
            $table->dropColumn('last_change_approved');
            $table->dropColumn('last_change_approved_by');
            $table->dropColumn('last_change_approved_on');
            $table->dropColumn('company_id');
        });
        Schema::table('emp_histories', function (Blueprint $table) {
            $table->dropColumn('last_change_approved');
            $table->dropColumn('last_change_approved_by');
            $table->dropColumn('last_change_approved_on');
            $table->dropColumn('company_id');
        });
    }
}
