<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanceFeesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance__fees__details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_step_id')->unsigned();
            $table->foreign('request_step_id')->references('id')->on('request__steps');
            $table->integer('fees_id')->unsigned();
            $table->foreign('fees_id')->references('id')->on('fees');

            $table->integer('container_id')->unsigned();
            $table->foreign('container_id')->references('id')->on('containers');
            $table->double('value')->nullable();
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
        Schema::dropIfExists('instance__fees__details');
    }
}
