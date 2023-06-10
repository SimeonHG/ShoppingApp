<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bank_user', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('user_id');
            // Add any additional pivot columns if needed

            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_user');
    }
};
