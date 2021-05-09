<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToSeparationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('separations', function (Blueprint $table) {
            $table->integer('stage')->default(0);
            $table->integer('workflow_id')->default(0);
            $table->integer('approved')->default(0);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('separations', function (Blueprint $table) {
            $table->dropColumn('stage');
            $table->dropColumn('workflow_id');
            $table->dropColumn('approved');
        });
    }
}
