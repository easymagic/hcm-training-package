<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGuarantorFieldToLoanRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("loan_requests",function(Blueprint $blueprint){

            $blueprint->integer('guarantor_id')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table("loan_requests",function(Blueprint $blueprint){

            $blueprint->dropColumn('guarantor_id');

        });
    }
}
