<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document__deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instance_id')->unsigned();
            $table->longText('notes')->nullable();
            $table->integer('request_step_id')->unsigned();
            $table->date('deliver_data')->nullable();
            $table->integer('ORG_id')->nullable();
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
        Schema::dropIfExists('document__deliveries');
    }
}
