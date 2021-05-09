<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToLeaveSpills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leave_spills', function (Blueprint $table) {
            if (Schema::hasColumn('leave_spills','company_id')) {
                //
            }else{
                $table->integer('company_id')->default(0);
            }


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leave_spills', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
    }
}
