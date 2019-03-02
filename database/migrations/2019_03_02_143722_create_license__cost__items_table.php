<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseCostItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license__cost__items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_cost_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->string('item_name')->nullable();
            $table->double('unit_price')->nullable();
            $table->double('discountprecent')->nullable();
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
        Schema::dropIfExists('license__cost__items');
    }
}
