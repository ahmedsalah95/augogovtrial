<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanceInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance__inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Request_Step_id')->nullable();
            $table->integer('Instance_id')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('Employee_id')->nullable();
            $table->date('Inspection_Date')->nullable();
            $table->string('Status')->nullable();
            $table->string('Notes')->nullable();
            $table->date('Receiving_Date')->nullable();
            $table->integer('Received_Request_Step_id')->nullable();
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
        Schema::dropIfExists('instance__inspections');
    }
}
