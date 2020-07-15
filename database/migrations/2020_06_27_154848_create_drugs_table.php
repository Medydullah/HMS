<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('drug_id');
            $table->integer('drug_name')->nullable();
            $table->string('price')->nullable();
             $table->date('expire_date')->nullable();
            $table->string('box_no')->nullable();
            $table->date('packet_no')->nullable(); //date
            $table->date('tablets_no')->nullable();  //date
            $table->string('employment_id')->nullable();
            $table->string('employment_name')->nullable();
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
        Schema::dropIfExists('drugs');
    }
}
