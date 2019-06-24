<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('LUS_id')->unsigned();
            $table->foreign('LUS_id')->references('id')->on('l_u_s_e_s');
            $table->integer('LUS_ORG_id')->nullable();
            $table->integer('User_id')->unsigned();
            $table->foreign('User_id')->references('id')->on('users');
            $table->integer('ORG_id')->nullable();
            $table->string('Stage')->nullable();
            $table->string('Virtual')->nullable();
            $table->string('Merged')->nullable();
            $table->string('Divided')->nullable();
            $table->string('Mortgage')->nullable();
            $table->string('Zero_Base')->nullable();
            $table->string('General_Conditions')->nullable();
            $table->double('Max_altitude')->nullable();
            $table->double('North_RODOD')->nullable();
            $table->double('South_RODOD')->nullable();
            $table->double('West_RODOD')->nullable();
            $table->double('East_RODOD')->nullable();
            $table->double('Building_Percentage')->nullable();
            $table->double('P_East')->nullable();
            $table->double('P_West')->nullable();
            $table->double('P_South')->nullable();
            $table->double('P_North')->nullable();
            $table->string('Image_Path')->nullable();
            $table->double('BUiLD_DeNSITY')->nullable();



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
        Schema::dropIfExists('lands');
    }
}
