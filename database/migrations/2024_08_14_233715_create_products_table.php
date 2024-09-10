<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the product (e.g., "Shirt", "Pant")
            $table->text('description')->nullable(); // Description of the product
            $table->string('size')->nullable(); // Size of the product (e.g., "S", "M", "L", "XL")
            $table->string('color')->nullable(); // Color of the product (e.g., "Red", "Blue", "Black")
            $table->decimal('price', 8, 2); // Price of the product
            $table->integer('quantity'); // Available quantity of the product
            $table->string('brand')->nullable(); // Brand of the product
            $table->string('category')->nullable(); // Category (e.g., "Shirts", "Pants")
            $table->string('material')->nullable(); // Material (e.g., "Cotton", "Polyester")
            $table->string('image_path')->nullable(); // Path to the product image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
