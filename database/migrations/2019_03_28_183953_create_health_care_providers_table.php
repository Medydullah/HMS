<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthCareProvidersTable extends Migration{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('health_care_providers', function (Blueprint $table) {
            $table->increments('id');
            #Basic info
            $table->string('facility_name')->unique();
            $table->string('facility_type')->nullable();
            $table->string('facility_registration_number')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();

            #Facility Location
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->string('ward')->nullable();

            #Admin Details
            $table->string('full_name')->nullable();
            $table->string('job_position')->nullable();
            $table->string('employee_id_number')->nullable();

            #Authentication Info
            $table->string('email')->nullable();
            $table->string('password')->nullable();

            $table->string('is_active')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('health_care_providers');
    }
}
