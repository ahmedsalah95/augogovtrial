<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('ORG_id')->nullable();
            $table->integer('instance_id')->nullable();
            $table->integer('lus_id')->nullable();
            $table->double('inspection_date')->nullable();
            $table->double('scheduled_date')->nullable();
            $table->string('no_need')->nullable();
            $table->string('irregulatries')->nullable();
            $table->integer('determine_request_step_id')->nullable();
            $table->integer('inspection_request_step_id')->nullable();
            $table->integer('monitor_request_step_id')->nullable();
            $table->string('lus_area')->nullable();
            $table->integer('islus_identical')->nullable();
            $table->double('difference_value')->nullable();
            $table->string('building_completed')->nullable();
            $table->string('inspection_result')->nullable();
            $table->string('no_building')->nullable();
            $table->string('elec_source_exist')->nullable();
            $table->double('exec_percentage')->nullable();
            $table->string('notes')->nullable();
            $table->integer('item_id')->nullable();
            $table->double('percentage')->nullable();
            $table->integer('lus_child_id')->nullable();
            $table->integer('orgstructure_id')->nullable();
            $table->string('re_inspection')->nullable();
            $table->string('exec_item_notes')->nullable();
            $table->date('release_date')->nullable();
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
        Schema::dropIfExists('inspections');
    }
}
