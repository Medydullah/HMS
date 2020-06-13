<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('medical_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('lab_result_id')->nullable();
            $table->string('name')->nullable();
             $table->date('diagnosed_at')->nullable();
            $table->string('medications_taken')->nullable();
            $table->date('medication_started_at')->nullable(); //date
            $table->date('medication_stopped_at')->nullable();  //date
            $table->string('medication_stoppage_reason')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */


    public function down()
    {
        Schema::dropIfExists('medical_conditions');
    }
}
