<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->string('name');
            $table->string('fathername');
            $table->string('email');
            $table->integer('mobile')->unsigned();
            $table->string('gender');
            $table->string('faculty');
            $table->string('department');
            $table->string('program');
            $table->string('batch');
            $table->integer('semester');
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
        Schema::dropIfExists('student_profiles');
    }
}
