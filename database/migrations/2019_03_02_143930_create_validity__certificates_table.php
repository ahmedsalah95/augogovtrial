<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidityCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validity__certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ORG_id')->nullable();
            $table->integer('instance_id')->unsigned();
            $table->integer('LUS_id')->unsigned();
            $table->date('Certificate_date')->nullable();
            $table->integer('usage_type_child_id')->nullable();

            $table->integer('usage_type_id')->unsigned();
            $table->integer('certificate_number')->nullable();
            $table->integer('lands_builddesnity')->nullable();
            $table->double('max_altitude')->nullable();
            $table->string('notes')->nullable();

            $table->integer('citizen_id')->unsigned();
            $table->string('sefah')->nullable();
            $table->double('east_margin')->nullable();
            $table->double('west_margin')->nullable();
            $table->double('south_margin')->nullable();
            $table->double('north_margin')->nullable();
            $table->double('east_margin_length')->nullable();
            $table->double('west_margin_length')->nullable();
            $table->double('south_margin_length')->nullable();
            $table->double('north_margin_length')->nullable();
            $table->double('d_west')->nullable();
            $table->double('d_east')->nullable();
            $table->double('d_south')->nullable();
            $table->double('d_north')->nullable();
            $table->double('west_rodod')->nullable();
            $table->double('east_rodod')->nullable();
            $table->double('south_rodod')->nullable();
            $table->double('north_rodod')->nullable();
            $table->double('p_west')->nullable();
            $table->double('p_east')->nullable();
            $table->double('p_south')->nullable();
            $table->double('p_north')->nullable();
            $table->string('imagepath')->nullable();
            $table->string('buildingdesc')->nullable();

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
        Schema::dropIfExists('validity__certificates');
    }
}
