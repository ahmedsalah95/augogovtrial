<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngineeringOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineering__offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('syndicate_reg_number');
            $table->string('tax_card');
            $table->string('commercial_register');
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
        Schema::dropIfExists('engineering__offices');
    }
}
