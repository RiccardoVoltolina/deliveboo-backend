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
        Schema::create('order_product', function (Blueprint $table) {
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->foreign('orders_id')->references('id')->on('orders');
            
            
            $table->unsignedBigInteger('products_id')->nullable();
            $table->foreign('products_id')->references('id')->on('products');
            
            $table->primary(['orders_id', 'products_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
