<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     *
     */

//old not in new
//===============
//
//EDLEVEL,
//account_num,
//age,
//bank_code,
//bank_name,
//confirmed,
//dribble,
//facebook,
//grade,
//instagram,
//job_app_id,
//job_reg_status,
//kin_address,
//kin_phonenum,
//kin_relationship,
//last_grade_change_date,
//lga,
//linemanager_id,
//locale,
//locked,
//next_of_kin,
//phone_num,
//prev_grade,
//role,
//sort_code,
//state_origin_id,
//twitter,
//workdept_id

    public function up()
    {
        //
	    Schema::table('users', function(Blueprint $blueprint){

		    $blueprint->string('EDLEVEL')->nullable();
		    $blueprint->string('account_num')->nullable();
		    $blueprint->string('age')->nullable();
		    $blueprint->string('bank_code')->nullable();
		    $blueprint->string('bank_name')->nullable();
		    $blueprint->string('confirmed')->nullable();
		    $blueprint->string('dribble')->nullable();
		    $blueprint->string('facebook')->nullable();
		    $blueprint->string('grade')->nullable();
		    $blueprint->string('instagram')->nullable();
		    $blueprint->string('job_app_id')->nullable();
		    $blueprint->string('job_reg_status')->nullable();
		    $blueprint->string('kin_address')->nullable();
		    $blueprint->string('kin_phonenum')->nullable();
		    $blueprint->string('kin_relationship')->nullable();
		    $blueprint->string('last_grade_change_date')->nullable();
		    $blueprint->string('lga')->nullable();
		    $blueprint->string('linemanager_id')->nullable();
		    $blueprint->string('locale')->nullable();
		    $blueprint->string('locked')->nullable();
		    $blueprint->string('next_of_kin')->nullable();
		    $blueprint->string('phone_num')->nullable();
		    $blueprint->string('prev_grade')->nullable();
		    $blueprint->string('role')->nullable();
		    $blueprint->string('sort_code')->nullable();
		    $blueprint->string('state_origin_id')->nullable();
		    $blueprint->string('twitter')->nullable();
		    $blueprint->string('workdept_id')->nullable();

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

	    Schema::table('users', function(Blueprint $blueprint){

		    $blueprint->dropColumn('EDLEVEL');
		    $blueprint->dropColumn('account_num');
		    $blueprint->dropColumn('age');
		    $blueprint->dropColumn('bank_code');
		    $blueprint->dropColumn('bank_name');
		    $blueprint->dropColumn('confirmed');
		    $blueprint->dropColumn('dribble');
		    $blueprint->dropColumn('facebook');
		    $blueprint->dropColumn('grade');
		    $blueprint->dropColumn('instagram');
		    $blueprint->dropColumn('job_app_id');
		    $blueprint->dropColumn('job_reg_status');
		    $blueprint->dropColumn('kin_address');
		    $blueprint->dropColumn('kin_phonenum');
		    $blueprint->dropColumn('kin_relationship');
		    $blueprint->dropColumn('last_grade_change_date');
		    $blueprint->dropColumn('lga');
		    $blueprint->dropColumn('linemanager_id');
		    $blueprint->dropColumn('locale');
		    $blueprint->dropColumn('locked');
		    $blueprint->dropColumn('next_of_kin');
		    $blueprint->dropColumn('phone_num');
		    $blueprint->dropColumn('prev_grade');
		    $blueprint->dropColumn('role');
		    $blueprint->dropColumn('sort_code');
		    $blueprint->dropColumn('state_origin_id');
		    $blueprint->dropColumn('twitter');
		    $blueprint->dropColumn('workdept_id');

	    });


    }
}
