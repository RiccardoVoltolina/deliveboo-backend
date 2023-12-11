<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('typology_user', function (Blueprint $table) {

            $table->unsignedBigInteger('typology_id');
            $table->foreign('typology_id')->references('id')->on('typologies');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typology_user');
    }
};
