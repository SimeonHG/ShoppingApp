<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table){
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('firmName');
            $table->string('adress');
            $table->string('phoneNumber');
            $table->string('mobileNumber');
            $table->string('email');
            $table->string('fax');
            $table->longText('comment');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
