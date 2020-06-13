<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique(); //phone or email
            $table->string('phone')->nullable(); //phone or email
            $table->string('dmw_token')->nullable(); // U2019-003-TGA5
            $table->string('password')->nullable();

            #Personal Details
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();

            $table->date('dob')->nullable(); //dirt of birth

            $table->string('ethnicity')->nullable();
            $table->string('tribe')->nullable();
            $table->string('occupation')->nullable();
            $table->string('working_hours')->nullable();

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
        Schema::dropIfExists('users');
    }
}
