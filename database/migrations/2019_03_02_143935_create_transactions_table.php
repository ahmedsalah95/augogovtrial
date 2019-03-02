<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Request_Step_id')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('Request_id')->nullable();
            $table->integer('Instance_id')->nullable();
            $table->integer('Comit_id')->nullable();
            $table->integer('User_id')->nullable();
            $table->integer('LUS_id')->nullable();
            $table->integer('License_Id')->nullable();
            $table->integer('POND_id')->nullable();
            $table->date('Transaction_Date')->nullable();
            $table->string('Notes')->nullable();
            $table->string('Canceled')->nullable();
            $table->integer('Assign_Number')->nullable();
            $table->string('Activity_Stop_Date')->nullable();
            $table->double('Return_Amount')->nullable();
            $table->integer('Mortagage_Transaction_id')->nullable();
            $table->integer('Bond_Agency_id')->nullable();
            $table->integer('Elam_Werasah')->nullable();
            $table->date('Return_Date')->nullable();
            $table->string('Cancel_Type')->nullable();
            $table->string('Stop_Reasons')->nullable();
            $table->integer('Stop_type_id')->nullable();
            $table->string('LUS_Stop')->nullable();
            $table->string('License_Stop')->nullable();
            $table->integer('Stop_Number')->nullable();
            $table->integer('Return_Number')->nullable();
            $table->integer('ORGStructure_id')->nullable();
            $table->date('Contr_PayDate')->nullable();
            $table->date('Contr_LitterDate')->nullable();
            $table->date('Contr_StartDate')->nullable();
            $table->string('Land_Tenure')->nullable();
            $table->string('Abdonamal_Type')->nullable();
            $table->integer('AD_Inherit_Number')->nullable();
            $table->date('AD_Inherit_Date')->nullable();
            $table->integer('AD_Inherit_Notes')->nullable();
            $table->double('ABD_Board_Trust_Value')->nullable();
            $table->double('ABD_Administrator_Value')->nullable();
            $table->integer('ABD_ISAL_Number')->nullable();
            $table->date('ABD_Payed_Date')->nullable();
            $table->date('Resumption_Date')->nullable();
            $table->double('Daily_Pently')->nullable();
            $table->integer('Contract_Number')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
