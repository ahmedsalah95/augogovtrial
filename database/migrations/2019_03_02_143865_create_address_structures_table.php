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

            $table->integer('address_item_instance_id')->unsigned();
            $table->integer('parent_id')->nullable();
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
