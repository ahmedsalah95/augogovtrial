<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanceFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance__fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_step_id')->unsigned();
            $table->foreign('request_step_id')->references('id')->on('request__steps');
            $table->integer('instance_request_id')->unsigned();
            $table->foreign('instance_request_id')->references('id')->on('instance__requests');
            $table->integer('fees_id')->unsigned();
            $table->foreign('fees_id')->references('id')->on('fees');
            $table->integer('ORG_id')->nullable();

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('receptor_empid')->nullable();
            $table->date('evaluation_date')->nullable();
            $table->double('total')->nullable();
            $table->date('payment_date')->nullable();
            $table->integer('treasure_number')->nullable();
            $table->integer('esal_number')->nullable();
            $table->integer('evaluator_empid')->nullable();
            $table->integer('payed_requeststep_id')->nullable();
            $table->double('payed_value')->nullable();
            $table->double('return_percentage')->nullable();
            $table->string('notes')->nullable();
            $table->integer('installment_number')->nullable();
            $table->string('payment_type')->nullable();

            $table->integer('LUS_id')->unsigned();
            $table->foreign('LUS_id')->references('id')->on('l_u_s');
            $table->string('canceled')->nullable();
            $table->string('check_number')->nullable();
            $table->integer('check_bank_id')->nullable();
            $table->date('check_date')->nullable();
            $table->double('check_value')->nullable();
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
        Schema::dropIfExists('instance__fees');
    }
}
