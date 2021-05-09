<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaxableTypeColumnToSpecificSalaryComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('chart_of_accounts', function (Blueprint $table) {
        //     $table->decimal('amount', 10, 2);
        // });
        Schema::table('specific_salary_components', function (Blueprint $table) {
            $table->integer('taxable_type')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('chart_of_accounts', function (Blueprint $table) {
        //     $table->dropColumn('amount');
        // });
        Schema::table('specific_salary_components', function (Blueprint $table) {
            $table->dropColumn('taxable_type');
        });
    }
}
