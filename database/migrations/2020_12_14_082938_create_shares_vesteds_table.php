<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharesVestedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares_vesteds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shares_allocation_id');
            $table->string('no_of_shares');
            //$table->string('shares');
            $table->date('date_vested');
            $table->enum('status',['pending','vested','cancelled','withdrawn']);
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
        Schema::dropIfExists('shares_vesteds');
    }
}
