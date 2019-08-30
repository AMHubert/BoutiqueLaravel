<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::enableForeignKeyConstraints();
        Schema::create('productCategory', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', "fk_productcategory_products")->references('product_id')->on('products');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', "fk_productcategory_categories")->references('category_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('productCategory');
    }
}
