<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('journal_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('table_name'); //visits || medication || symptom || immunization || allergy
            $table->integer('item_id');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(){
        Schema::dropIfExists('journal_records');
    }

}
