<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorder_page', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_page');
            $table->longText('bodyhtml')->nullable();
            $table->text('iframe')->nullable();
        });
        Schema::create('Preorder_products', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string("Product_Name");
            $table->string("Product_Code");
            $table->double("Price");
            $table->double("Reduced_Price")->nullable();
            $table->double('Deposit')->nullable();
            $table->integer("Quantity");
            $table->Text("Gift")->nullable();
            $table->boolean("status");
            $table->integer('preorder_page_id')->unsigned();
            $table->foreign('preorder_page_id')->references('id')->on('preorder_page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preorder_page');
        Schema::dropIfExists('Preorder_products');
    }
}
