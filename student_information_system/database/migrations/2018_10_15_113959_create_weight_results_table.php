<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_results', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cgpa');
            $table->double('marks_perc');
            $table->integer('nocha');
            $table->integer('ch_pass');
            $table->string('status');
            $table->integer('stud_id');
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
        Schema::dropIfExists('weight_results');
    }
}
