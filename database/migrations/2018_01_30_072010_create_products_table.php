<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('description')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->text('size_id')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('gpd_id')->nullable();
            $table->string('gpd_barcode',50)->nullable();
            $table->string('ean',20)->nullable();
            $table->text('description_long')->nullable();
            $table->integer('vat')->nullable();
            $table->double('price_excl', 9, 2)->nullable();
            $table->integer('season')->nullable();
            $table->double('price_stock', 10, 1)->nullable();
            $table->string('color_nr',50)->nullable();
            $table->string('color',75)->nullable();
            $table->string('image',150)->nullable();
            $table->double('reordered', 10, 1)->nullable();
            $table->double('retourned', 10, 1)->nullable();
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
        Schema::dropIfExists('t_products');
    }
}
