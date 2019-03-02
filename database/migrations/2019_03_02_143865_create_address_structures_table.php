<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_structures', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('instance_id')->unsigned();
            $table->foreign('instance_id')->references('id')->on('address_item_instances');
            $table->integer('structure_id_parent')->nullable();
            $table->string('acc_code')->nullable();
            $table->string('acc_address')->nullable();
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
        Schema::dropIfExists('address_structures');
    }
}
