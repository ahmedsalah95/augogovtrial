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
            $table->integer('instance_request_id')->unsigned()->nullable();
            $table->integer('request_step_id')->unsigned()->nullable();
            $table->integer('fees_id')->unsigned()->nullable();

            $table->integer('container_id')->unsigned()->nullable();
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
