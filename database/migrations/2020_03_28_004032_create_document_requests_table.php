<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_requests', function (Blueprint $table) {
            //'title','document_request_type_id','date_due','file','user_id','workflow_id','status','company_id','comment'
            $table->increments('id');
            $table->string('title');
            $table->integer('document_request_type_id');
            $table->date('due_date')->nullable();
            $table->string('file')->nullable();
            $table->integer('user_id');
            $table->integer('workflow_id');
            $table->integer('status')->default(0);
            $table->integer('company_id');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('document_requests');
    }
}
