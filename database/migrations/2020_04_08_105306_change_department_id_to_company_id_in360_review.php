<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDepartmentIdToCompanyIdIn360Review extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e360_det_questions', function (Blueprint $table) {
            $table->renameColumn('e360_det_id', 'mp_id');
        });
        Schema::table('e360_evaluations', function (Blueprint $table) {
            $table->renameColumn('e360_det_id', 'mp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e360_det_questions', function (Blueprint $table) {
            $table->renameColumn('mp_id','e360_det_id' );
        });
        Schema::table('e360_evaluations', function (Blueprint $table) {
            $table->renameColumn('mp_id','e360_det_id' );
        });
    }
}
