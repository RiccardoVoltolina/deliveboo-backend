<?php

use App\Models\Restaurant;
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
        Schema::create('restaurants_typologies', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');


            $table->unsignedBigInteger('typologies_id')->nullable();
            $table->foreign('typologies_id')->references('id')->on('typologies');

            $table->primary(['restaurant_id', 'typologies_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants_typologies');
    }
};
