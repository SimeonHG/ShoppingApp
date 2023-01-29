<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsLabelsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_labels', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('contacts')
                ->onDelete('cascade');
            $table->unsignedBigInteger('label_id')->unsigned();
            $table->foreign('label_id')->references('id')->on('labels')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_labels');
    }
}
