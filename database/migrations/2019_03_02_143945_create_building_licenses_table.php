<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ORG_id')->nullable();
            $table->integer('Buliding_Type_id')->nullable();
            $table->string('Ref_license')->nullable();
            $table->date('Issue_Date')->nullable();
            $table->string('Postal_Address')->nullable();
            $table->integer('Supervisor_Eng_id')->nullable();
            $table->integer('Designer_Eng_id')->nullable();
            $table->integer('Consultant_Eng_id')->nullable();
            $table->string('License_Type')->nullable();
            $table->string('Work_Description')->nullable();
            $table->double('West_length')->nullable();
            $table->double('South_Length')->nullable();
            $table->double('North_length')->nullable();
            $table->double('East_length')->nullable();
            $table->double('East_Margin')->nullable();
            $table->double('South_Margin')->nullable();
            $table->double('North_Margin')->nullable();
            $table->double('West_Margin')->nullable();
            $table->string('UnderGround')->nullable();
            $table->integer('Repeated_Numbe')->nullable();
            $table->integer('Units_Number')->nullable();
            $table->string('Working_Area')->nullable();
            $table->double('Land_Area')->nullable();
            $table->integer('ENG_Office_ID')->nullable();
            $table->string('Work_Category')->nullable();
            $table->integer('Request_Eng_id')->nullable();
            $table->integer('Template_id')->nullable();
            $table->string('Template_Color')->nullable();
            $table->double('Build_Percentage')->nullable();
            $table->double('TotalCost')->nullable();
            $table->double('Cleaning_Fee')->nullable();
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
            $table->string('LUS_Image')->nullable();
            $table->string('LUS_Child')->nullable();
            $table->double('GEN_TotalCost')->nullable();
            $table->double('Digging_Size')->nullable();
            $table->string('LUS_ChildArea')->nullable();
            $table->integer('LUS_Child_ID')->nullable();
            $table->double('Unit_Price')->nullable();
            $table->string('Finishing_Level')->nullable();
            $table->integer('User_ID')->nullable();
            $table->integer('Insurance_ID')->nullable();
            $table->integer('Insurance_Number')->nullable();
            $table->integer('Certificate_id')->nullable();
            $table->string('License_Decision')->nullable();
            $table->string('Status')->nullable();
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
        Schema::dropIfExists('building_licenses');
    }
}
