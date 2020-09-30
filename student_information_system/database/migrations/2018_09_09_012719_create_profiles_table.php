<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
            $table->string('father_name');
            $table->string('email');
            $table->date('dob');
            $table->string('gender');
            $table->string('nationality');
            $table->bigInteger('cnic')->unique();
            $table->string('domicile');
            $table->string('reg')->unique();
            $table->string('faculity');
            $table->string('department');
            $table->string('program');
            $table->string('batch');
            $table->integer('semester');
            $table->string('address');
            $table->string('city');
            $table->integer('phone')->unsigned();
            $table->string('password');
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
        Schema::dropIfExists('profiles');
    }
}
