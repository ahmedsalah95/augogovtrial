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
            
            $table->integer('instance_id')->nullable();
            $table->integer('request_Step_id')->nullable();
            $table->integer('received_request_step_id')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('org_id')->nullable();

            $table->string('status')->nullable();
            $table->string('notes')->nullable();

            $table->date('inspection_Date')->nullable();
            $table->date('receiving_Date')->nullable();

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
