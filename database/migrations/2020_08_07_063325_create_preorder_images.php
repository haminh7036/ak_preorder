<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreorderImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorder_image_preorder_product', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('preorder_product_id')->unsigned();
            $table->integer('preorder_image_id')->unsigned();

            $table->foreign('preorder_product_id')->references('id')->on('Preorder_products');
            $table->foreign('preorder_image_id')->references('id')->on('Preorder_images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preorder_image_preorder_product');
    }
}
