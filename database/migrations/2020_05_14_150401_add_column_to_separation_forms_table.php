<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToSeparationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('separation_forms', function (Blueprint $table) {
            $table->text('handover_note')->nullable();
        });
        Schema::table('separations', function (Blueprint $table) {
            $table->integer('initiator_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('separation_forms', function (Blueprint $table) {
            $table->dropColumn('handover_note');
        });
        Schema::table('separations', function (Blueprint $table) {
            $table->dropColumn('initiator_id');
        });
    }
}
