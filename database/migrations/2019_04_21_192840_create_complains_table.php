<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('citizen_national_id')->nullable();
            $table->string('citizen_name')->nullable();
            $table->string('isProcessed')->nullable();
            $table->text('mime')->nullable();
            $table->text('original_filename')->nullable();
            $table->text('filename')->nullable();
            $table->string('complain_content')->nullable();
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
        Schema::dropIfExists('complains');
    }
}
