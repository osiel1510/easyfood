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
        Schema::create('section_option_products', function (Blueprint $table) {
            $table->unsignedBigInteger('section_option_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('section_option_id')->references('id')->on('section_options')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_option_products');
    }
};
