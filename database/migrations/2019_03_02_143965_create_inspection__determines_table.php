<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionDeterminesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection__determines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_step_id')->nullable();
            $table->integer('instance_id')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('employee_id')->nullable();
            $table->date('inspection_date')->nullable();
            $table->string('status')->nullable();
            $table->string('notes')->nullable();
            $table->date('receiving_date')->nullable();
            $table->integer('received_request_step_id')->nullable();
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
        Schema::dropIfExists('inspection__determines');
    }
}
