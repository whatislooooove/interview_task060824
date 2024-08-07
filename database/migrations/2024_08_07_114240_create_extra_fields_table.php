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
            $table->string('size', 10);
            $table->string('colour', 10);
            $table->string('brand', 10);
            $table->string('composition', 30);
            $table->unsignedTinyInteger('quantity_in_package');
            $table->string('quantity_url', 50);
            $table->text('image_url');
            $table->string('seo_title');
            $table->string('seo_h1', 30);
            $table->text('seo_description');
            $table->unsignedSmallInteger('weight');
            $table->unsignedSmallInteger('width');
            $table->unsignedSmallInteger('height');
            $table->unsignedSmallInteger('length');
            $table->unsignedSmallInteger('package_weight');
            $table->unsignedSmallInteger('package_width');
            $table->unsignedSmallInteger('package_height');
            $table->string('category');
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
