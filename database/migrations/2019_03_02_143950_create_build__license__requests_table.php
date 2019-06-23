<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildLicenseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build__license__requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Build_License_id')->nullable();
            $table->integer('Instance_id')->nullable();
            $table->integer('Supervisor_Eng_id')->nullable();
            $table->integer('Designer_Eng_id')->nullable();
            $table->integer('Consultant_Eng_id')->nullable();
            $table->string('License_Type')->nullable();
            $table->string('Building_Type')->nullable();
            $table->string('Work_Description')->nullable();
            $table->double('West_length')->nullable();
            $table->double('South_Length')->nullable();
            $table->double('North_length')->nullable();
            $table->double('East_length')->nullable();
            $table->double('East_Margin')->nullable();
            $table->double('South_Margin')->nullable();
            $table->double('North_Margin')->nullable();
            $table->double('West_Margin')->nullable();
            $table->string('Column_Template')->nullable();
            $table->integer('Repeated_Number')->nullable();
            $table->string('Working_Area')->nullable();
            $table->integer('Units_Number')->nullable();
            $table->double('Land_Area')->nullable();
            $table->string('UnderGround')->nullable();
            $table->integer('ENG_Office_ID')->nullable();
            $table->string('Work_Category')->nullable();
            $table->integer('Request_Eng_id')->nullable();
            $table->string('Request_Description')->nullable();
            $table->double('North_RODOD')->nullable();
            $table->double('South_RODOD')->nullable();
            $table->double('West_RODOD')->nullable();
            $table->double('East_RODOD')->nullable();
            $table->double('P_East')->nullable();
            $table->double('P_West')->nullable();
            $table->double('P_South')->nullable();
            $table->double('P_North')->nullable();
            $table->double('D_East')->nullable();
            $table->double('D_West')->nullable();
            $table->double('D_South')->nullable();
            $table->double('D_North')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('Certificate_id')->nullable();
            $table->integer('Dec_id')->nullable();
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
        Schema::dropIfExists('build__license__requests');
    }
}
