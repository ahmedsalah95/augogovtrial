<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIrregularitesRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irregularites__requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('irreg_id')->nullable();
            $table->integer('lus_id')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->double('penality_value')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('irregularites__requests');
    }
}
