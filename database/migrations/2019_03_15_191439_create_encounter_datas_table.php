<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncounterDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('encounter_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encounter_id')->nullable();

            $table->boolean('is_fee_paid')->default(false);
            $table->string('fee_amount')->nullable();

            $table->text('text_1')->nullable();
            $table->text('text_2')->nullable();
            $table->string('text_3')->nullable();
            $table->string('text_4')->nullable();

            $table->text('file_path_1')->nullable();
            $table->text('file_path_2')->nullable();
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
        Schema::dropIfExists('encounter_datas');
    }
}
