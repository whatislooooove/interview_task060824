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
        Schema::create('extra_fields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->string('size', 10)->nullable();
            $table->string('colour', 50)->nullable();
            $table->string('brand', 30)->nullable();
            $table->string('composition', 100)->nullable();
            $table->unsignedTinyInteger('quantity_in_package')->nullable();
            $table->string('quantity_url', 50)->nullable();
            $table->text('image_url')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_h1', 30)->nullable();
            $table->text('seo_description')->nullable();
            $table->unsignedSmallInteger('weight')->nullable();
            $table->unsignedSmallInteger('width')->nullable();
            $table->unsignedSmallInteger('height')->nullable();
            $table->unsignedSmallInteger('length')->nullable();
            $table->unsignedSmallInteger('package_weight')->nullable();
            $table->unsignedSmallInteger('package_width')->nullable();
            $table->unsignedSmallInteger('package_height')->nullable();
            $table->unsignedSmallInteger('package_length')->nullable();
            $table->string('category')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_fields');
    }
};
