<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ORG_id')->nullable();
            $table->integer('License_Number')->nullable();
            $table->integer('License_Type_id')->nullable();
            $table->string('License_Year')->nullable();
            $table->integer('Instance_id')->nullable();
            $table->integer('Transaction_id')->nullable();
            $table->integer('LUS_id')->nullable();
            $table->string('Canceled')->nullable();
            $table->string('Stopped')->nullable();
            $table->integer('File_Number')->nullable();
            $table->string('Responsible_Engineer')->nullable();
            $table->string('Append_Char')->nullable();
            $table->integer('Old_id')->nullable();
            $table->string('License_Stop')->nullable();

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
        Schema::dropIfExists('licenses');
    }
}
