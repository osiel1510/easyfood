<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSectionOptionTable extends Migration
{
    public function up()
    {
        Schema::create('product_section_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('section_option_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('section_option_id')->references('id')->on('section_options')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_section_option');
    }
}
