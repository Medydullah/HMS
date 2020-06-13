<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encounters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visit_id')->nullable();
            $table->integer('encounter_code')->unique(); //unique
            $table->string('description')->nullable(); //unique
            $table->string('text_1')->nullable();
            $table->string('text_2')->nullable();
            $table->string('text_3')->nullable();
            $table->timestamps();
        });
    }


    #Encounter codes
    # 001 Symptoms
    # 002 Physical examination
    # 003 Investigations/Lab tests
    # 004 Prescriptions
    # 005 Advice
    # 006 Final Diagnosis
    # 007


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encounters');
    }
}
