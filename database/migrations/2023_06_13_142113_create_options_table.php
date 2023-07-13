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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('section_options_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('section_options_id')->references('id')->on('section_options')->onDelete('cascade');
            $table->string('nombre');
            $table->decimal('precio', 8, 2)->default(0.00);
            $table->boolean('disponibilidad');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
