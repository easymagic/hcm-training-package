<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNotificationActiveStatusAddReminderBefore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('notification_active_statuses', function (Blueprint $table) {
            $table->string('reminder_before')->default('0');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('probation_period')->default(0);
        });

        Schema::table('query_threads', function (Blueprint $table) {
            $table->string('action_taken')->default('NA');
            $table->date('effective_date')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notification_active_statuses', function (Blueprint $table) {
            $table->dropColumn('reminder_before');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('probation_period');
        });
        Schema::table('queries', function (Blueprint $table) {
            $table->dropColumn('action_taken');
            $table->dropColumn('effective_date');
        });
        //
    }
}
