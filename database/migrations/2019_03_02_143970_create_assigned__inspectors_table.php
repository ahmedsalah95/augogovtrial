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
            $table->integer('org_id')->nullable();
            $table->integer('inspection_id')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('user_id')->nullable();
            
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
