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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->unique();
            $table->string('name');
            $table->decimal('price');
            $table->integer('quantity');
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('color_id')->references('id')->on('color');
            $table->foreign('size_id')->references('id')->on('size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
