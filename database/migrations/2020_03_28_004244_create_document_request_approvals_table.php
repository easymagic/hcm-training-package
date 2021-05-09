<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentRequestApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_request_approvals', function (Blueprint $table) {
//            'document_request_id','stage_id','approver_id','comments','status'
            $table->increments('id');
            $table->integer('document_request_id');
            $table->integer('stage_id');
            $table->integer('approver_id');
            $table->text('comments');
            $table->integer('status');
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
        Schema::dropIfExists('document_request_approvals');
    }
}
