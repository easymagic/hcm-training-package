<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('created_by');
            $table->string('attendance_report_id');
            $table->string('status')->default('open');
            $table->string('pay_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_payrolls');
    }
}
