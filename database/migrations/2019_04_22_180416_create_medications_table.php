<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('medical_condition_id')->nullable();
            $table->string('name')->nullable();
            $table->string('taken_for')->nullable();
            $table->string('dosage')->nullable();
            $table->date('started_at')->nullable();
            $table->date('ended_at')->nullable();
            $table->string('instruction')->nullable(); // One pill a day
            $table->string('intake_method')->nullable();

            $table->string('results')->nullable();
            $table->string('is_scheduled')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('medications');
    }
}
