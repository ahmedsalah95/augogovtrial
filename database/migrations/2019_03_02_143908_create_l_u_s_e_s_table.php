<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLUSESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_u_s_e_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ORG_id')->nullable();
            $table->integer('Usage_Type_id')->nullable();
            $table->integer('OwnerShip_Type_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('Area')->nullable();
            $table->integer('Serial')->nullable();
            $table->integer('Structure_id')->unsigned();
            $table->integer('National_Real_State_id')->nullable();
            $table->string('Stop')->nullable();
            $table->string('Stop_Notes')->nullable();
            $table->integer('Usage_Type_Child_id')->nullable();
            $table->string('Acc_Code')->nullable();
            $table->integer('Transaction_id')->nullable();
            $table->string('Region')->nullable();
            $table->string('Executive_Status')->nullable();
            $table->string('Parent_LUS')->nullable();
            $table->string('Assign_Stage')->nullable();
            $table->date('Stop_Date')->nullable();
            $table->string('Land_Sketch')->nullable();
            $table->string('Area_Origonal')->nullable();
            $table->integer('LUS_Type_id')->nullable();
            $table->string('Address_desc')->nullable();
            $table->string('Notes')->nullable();
            $table->integer('LUS_Type_Child_Id')->nullable();
            $table->string('Area_SHM')->nullable();
            $table->double('Area_Carat')->nullable();
            $table->double('Area_arce')->nullable();
            $table->double('Acre_Price')->nullable();
            $table->double('Area_Meter')->nullable();
            $table->double('Total_Price')->nullable();
            $table->string('Area_Type')->nullable();
            $table->string('Hood')->nullable();
            $table->string('Divide_letter')->nullable();
            $table->double('SHM_Price')->nullable();
            $table->double('Carat_Price')->nullable();
            $table->double('Meter_Price')->nullable();
            $table->string('CalcArea_Type')->nullable();
            $table->double('East_Margin')->nullable();
            $table->double('West_Margin')->nullable();
            $table->double('South_Margin')->nullable();
            $table->double('North_Margin')->nullable();
            $table->double('East_Margin_Length')->nullable();
            $table->double('West_Margin_Length')->nullable();
            $table->double('South_Margin_Length')->nullable();
            $table->double('North_Margin_Length')->nullable();
            $table->string('General_Conditions')->nullable();
            $table->string('IN_Courdon')->nullable();
            $table->string('IN_Building_Area')->nullable();
            $table->double('D_West')->nullable();
            $table->double('D_East')->nullable();
            $table->double('D_South')->nullable();
            $table->double('D_North')->nullable();
            $table->integer('Inhabitants_Accept_Number')->nullable();
            $table->string('Inhabitants_Physical')->nullable();
            $table->integer('Workers_Number')->nullable();
            $table->integer('Project_Type_id')->nullable();
            $table->double('North_RODOD')->nullable();
            $table->double('South_RODOD')->nullable();
            $table->double('West_RODOD')->nullable();
            $table->double('East_RODOD')->nullable();
            $table->double('P_West')->nullable();
            $table->double('P_East')->nullable();
            $table->double('P_South')->nullable();
            $table->double('P_North')->nullable();
            $table->double('Rent_Value')->nullable();
            $table->integer('Payment_Type_id')->unsigned()->nullable();
            $table->integer('Law_id')->unsigned()->nullable();
            $table->string('deleted')->nullable();
            $table->string('Old_Module')->nullable();
            $table->string('LUS_Location')->nullable();
            $table->string('Assign_Serial')->nullable();
            $table->integer('State_id')->nullable();
            

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
        Schema::dropIfExists('l_u_s_e_s');
    }
}
