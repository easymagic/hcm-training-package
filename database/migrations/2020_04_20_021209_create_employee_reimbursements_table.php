<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeReimbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_reimbursements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('expense_reimbursement_type_id');
            $table->date('expense_date')->nullable();
            $table->decimal('amount', 11, 2)->nullable();
            $table->date('disbursement_date')->nullable();
            $table->integer('disbursed')->default(0);
            $table->string('attachment')->nullable();
            $table->integer('user_id');
            $table->integer('workflow_id');
            $table->integer('status')->default(0);
            $table->integer('company_id');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('employee_reimbursements');
    }
}
