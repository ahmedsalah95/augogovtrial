<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIrregularitiesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irregularities__types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ORG_id')->nullable();
            $table->integer('inspection_id')->nullable();
            $table->integer('employee_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('lus_id')->nullable();
            $table->integer('c_instanceid')->nullable();
            $table->string('description')->nullable();
            $table->date('irreg-date')->nullable();
            $table->string('commette_report')->nullable();
            $table->double('penalty-value')->nullable();
            $table->string('modify_drawing')->nullable();
            $table->string('modification_description')->nullable();
            $table->string('elimination')->nullable();
            $table->string('elimination_description')->nullable();
            $table->string('irreg_corrected')->nullable();
            $table->string('policies')->nullable();
            $table->string('notes')->nullable();
            $table->date('penalty_date')->nullable();
            $table->integer('penality_isal_number')->nullable();

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
        Schema::dropIfExists('irregularities__types');
    }
}
