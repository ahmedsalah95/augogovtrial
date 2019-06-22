<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanceAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance__attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attachment_id')->unsigned();
            $table->foreign('attachment_id')->references('id')->on('attachments');
            $table->integer('cat')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('Archived')->nullable();
            $table->integer('Received')->nullable();
            $table->integer('deleted')->nullable();
            $table->string('mandatory_optional')->nullable();
            $table->integer('archive_document_id')->nullable();
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
        Schema::dropIfExists('instance__attachments');
    }
}
