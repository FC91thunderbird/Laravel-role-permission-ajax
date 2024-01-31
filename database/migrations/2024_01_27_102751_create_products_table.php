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
            $table->string('title')->unique();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('sub_id');
            $table->string('description')->nullable();
            $table->decimal("sell_price", 6, 2)->nullable();
            $table->decimal("buy_price", 6, 2)->nullable();
            // $table->string('sell_price')->nullable();
            // $table->string('buy_price')->nullable();
            $table->string('image');
            $table->integer('sku')->nullable();

            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('sub_id')->references('id')->on('subcategories');
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
