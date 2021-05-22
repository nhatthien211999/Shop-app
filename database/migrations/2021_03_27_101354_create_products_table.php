<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('promotion_id')->nullable();
            $table->integer('total_sold')->nullable();
            $table->integer('menu_id')->nullable();
            $table->string('price');
            $table->string('status');
            $table->string('name');
            $table->string('image');
            $table->string('description')->nullable();
            $table->string('sale')->nullable();
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
}
