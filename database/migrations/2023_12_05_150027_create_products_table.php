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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->float('price', 5, 2);
            $table->text('description');
            $table->string('cover_image');
            $table->unsignedBigInteger('user_id');

            // prendo l id degli utenti nella migrazione degli users
            
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('ingredients');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
