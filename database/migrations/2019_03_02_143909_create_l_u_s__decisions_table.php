<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLUSDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_u_s__decisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ORG_id')->nullable();
            $table->integer('LUS_id')->unsigned();

            $table->integer('Decision_Number')->nullable();
            $table->date('Decision_Date')->nullable();
            $table->string('Notes')->nullable();
            $table->string('External_ORG')->nullable();
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
        Schema::dropIfExists('l_u_s__decisions');
    }
}
