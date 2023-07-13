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
            $table->timestamps();
            $table->string('nombre');
            $table->boolean('disponibilidad');
            $table->string('imagen')->nullable();
            $table->string('descripcion')->nullable();
            $table->decimal('precio', 8, 2)->default(0.00);
            $table->unsignedBigInteger('sections_id')->nullable();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

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