<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotificationMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('notification_messages',function(Blueprint $table){
            $columns=['notification_type_id','a_id','company_id'];
            $table->increments('id');
            foreach($columns as $column){
                $table->integer($column);
            }
            $table->string('message',1000);
            $table->timestamps();

        });



        Schema::create('notification_types',function(Blueprint $table){


            $table->increments('id');
            $table->string('name');
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
        Schema::dropIfExists('notification_messages');
        Schema::dropIfExists('notification_types');
        //
    }
}
