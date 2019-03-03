<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedInspectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned__inspectors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Inspection_id')->nullable();
            $table->integer('Employee_id')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('User_id')->nullable();
            
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
        Schema::dropIfExists('assigned__inspectors');
    }
}
