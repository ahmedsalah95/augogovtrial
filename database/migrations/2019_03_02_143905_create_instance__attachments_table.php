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
            $table->integer('cat')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('archived')->nullable();
            $table->integer('received')->nullable();
            $table->integer('deleted')->nullable();
            $table->boolean('mandatory')->nullable();
            $table->integer('archived_document_id')->nullable();
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
