<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMfpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id');
            $table->integer('form_id');
            $table->integer('group_id');
            $table->string('name');
            $table->boolean('insert')->default(0);
            $table->boolean('update')->default(0);
            $table->boolean('delete')->default(0);
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
        Schema::dropIfExists('mfp');
    }
}
