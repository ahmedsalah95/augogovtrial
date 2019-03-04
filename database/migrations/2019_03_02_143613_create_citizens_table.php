<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('citizen_name')->nullable();
            $table->string('citizen_national_id')->nullable();
            $table->integer('passport_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->longText('address')->nullable();
            $table->longText('status')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('religion')->nullable();
            $table->string('wife_name')->nullable();
            $table->integer('insurance_number')->nullable();
            $table->string('job')->nullable();
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
        Schema::dropIfExists('citizens');
    }
}
