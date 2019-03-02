<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleFormPriviliagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module__form_priviliages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id')->nullable();
            $table->integer('form_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('privilege')->nullable();
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
        Schema::dropIfExists('module__form_priviliages');
    }
}
