<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //int
            $table->string('dmw_token'); //int
            $table->string('serial_number')->nullable(); //form serial number

            $table->integer('provider_id');
            $table->boolean('taken');

            $table->string('consultation_fee')->nullable();
            $table->string('nhif_card_number')->nullable();
            $table->string('payment_type')->nullable(); //cash or insurance

            $table->string('insurance_provider')->nullable(); #for future

            $table->boolean('patient_confirmation')->nullable(); #true or false
            $table->boolean('is_active')->default(true); #true or false
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
