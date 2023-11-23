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
            $table->string('name')->unique();
            $table->string('company');
            $table->enum('category', ['House Hold', 'Beauty', 'Food']);
            $table->string('skuno')->unique();
            $table->string('batch_no')->unique();
            $table->enum('size', ['Small', 'Medium', 'Large']);
            $table->string('image')->nullable();
            
            $table->integer('qty');
            $table->decimal('price', 8, 2);
            $table->enum('stock_status', ['In Stock', 'Out of Stock']);
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
