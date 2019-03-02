<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLUSAssignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_u_s__assignations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ORG_id')->nullable();
            $table->integer('Assign_Number')->nullable();
            $table->integer('LUS_id')->unsigned();
            $table->foreign('LUS_id')->references('id')->on('l_u_s');
            $table->integer('Assignation_Type_id')->unsigned();
            $table->foreign('Assignation_Type_id')->references('id')->on('assignation_types');
            $table->integer('Distinction_Type_id')->nullable();

            $table->integer('Transaction_id')->nullable();
            $table->integer('payment_id')->unsigned();
            $table->foreign('payment_id')->references('id')->on('payment__types');

            $table->integer('Module_id')->unsigned();
            $table->foreign('Module_id')->references('id')->on('modules');
            $table->date('Assignation_Date')->nullable();
            $table->double('Unit_Price')->nullable();
            $table->double('Total_Price')->nullable();
            $table->double('istinction_Percent')->nullable();
            $table->integer('Receiving_Record_Number')->nullable();
            $table->date('Receiving_Date')->nullable();
            $table->double('Installments_Count')->nullable();
            $table->double('Down_Payment')->nullable();
            $table->string('Canceled')->nullable();
            $table->string('payment_type')->nullable();
            $table->integer('Reciept_Number')->nullable();
            $table->string('Notes')->nullable();
            $table->string('Extra_Area')->nullable();
            $table->double('Extra_Price')->nullable();
            $table->date('Extra_Due_Date')->nullable();
            $table->integer('Activity_id')->nullable();
            $table->integer('Detail_Activity_id')->nullable();
            $table->date('Down_Payment_Date')->nullable();
            $table->string('Assignation_DOC')->nullable();
            $table->string('Recipient')->nullable();
            $table->string('SEFAH')->nullable();
            $table->string('Personal_Data')->nullable();
            $table->integer('ecv_Commit_id')->nullable();
            $table->string('Land_Template')->nullable();
            $table->double('Other_Fees')->nullable();
            $table->string('Other_Fees_Types')->nullable();
            $table->double('Down_Payment_Percent')->nullable();
            $table->double('Installment_Value')->nullable();
            $table->string('Installment_Value_Type')->nullable();
            $table->date('Installment_Start_Date')->nullable();
            $table->date('Legal_Deliver_Date')->nullable();
            $table->double('Rental_Anual_Percent')->nullable();
            $table->double('Rental_Value')->nullable();
            $table->date('Rental_Month')->nullable();
            $table->integer('File_Number')->nullable();
            $table->string('Ministerial_Decree')->nullable();
            $table->integer('Booking_Serial')->nullable();
            $table->double('Interest_Ratio')->nullable();
            $table->string('Fee_Board_of_Trustness')->nullable();
            $table->double('Booking_Start')->nullable();
            $table->double('Heightening_Bouns')->nullable();
            $table->date('Booking_Start_Date')->nullable();
            $table->integer('Receipt_id')->nullable();
            $table->integer('Financial_Serial')->nullable();
            $table->date('Activity_End_Date')->nullable();
            $table->string('LUS_Notes')->nullable();
            $table->date('Contract_Date')->nullable();
            $table->string('Accept_Tawkeel')->nullable();
            $table->date('Last_Adoption_Scheme')->nullable();
            $table->string('Approved_Plan')->nullable();
            $table->double('OutArea')->nullable();
            $table->date('Cleaning_Start_Date')->nullable();
            $table->double('Cleaning_Fees_Payed')->nullable();
            $table->date('Cleaning_Last_Pay_Date')->nullable();
            $table->double('Calc_Finance_Interest')->nullable();
            $table->double('Finance_Interest_Perc')->nullable();
            $table->date('Rent_Start_Date')->nullable();
            $table->date('Rent_End_Date')->nullable();
            $table->string('Rent_Type')->nullable();
            $table->string('Finance_Interest_Type')->nullable();
            $table->double('Sales_Number')->nullable();
            $table->integer('Law_id')->unsigned();
            $table->foreign('Law_id')->references('id')->on('laws');
            $table->double('Evaluation_Price')->nullable();
            $table->double('Price_Bat')->nullable();
            $table->integer('OwnerShip_Type_id')->nullable();
            $table->string('OwnerShip_Type')->nullable();
            $table->date('Final_Acceptance_Date')->nullable();
            $table->date('End_Date')->nullable();
            $table->integer('Page_Number')->nullable();
            $table->integer('Business_Register_Number')->nullable();
            $table->date('OwnerShip_Date')->nullable();
            $table->double('Assign_Value_DESC')->nullable();
            $table->integer('DES_id')->nullable();
            $table->double('Assignation_Value')->nullable();
            $table->string('Assign_Name')->nullable();
            $table->string('Owner_External_ORG')->nullable();
            $table->string('Decision_Department')->nullable();
            $table->string('Stating_That')->nullable();
            $table->string('Fouth_Point')->nullable();
            $table->string('Signing_Person')->nullable();
            $table->date('Desc_Year')->nullable();
            $table->string('Desc_Text')->nullable();
            $table->integer('Request_Number')->nullable();
            $table->date('Request_Date')->nullable();
            $table->integer('Estate_Number')->nullable();
            $table->date('Estate_Date')->nullable();
            $table->integer('REG_Number')->nullable();
            $table->string('Sale_Type')->nullable();
            $table->date('REG_Year')->nullable();
            $table->date('Initial_Accept_Date')->nullable();
            $table->integer('AssignDescision_Number')->nullable();
            $table->date('Last_Instance_Date')->nullable();
            $table->date('Finish_Instance_Date')->nullable();
            $table->double('PaidToDate')->nullable();
            $table->string('Installment_Notes')->nullable();

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
        Schema::dropIfExists('l_u_s__assignations');
    }
}
