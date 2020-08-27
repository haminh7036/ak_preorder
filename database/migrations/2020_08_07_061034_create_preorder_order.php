<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreorderOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorder_orders', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('Name');
            $table->boolean('Gender');
            $table->text('Phone_Number');
            $table->text('Other_request')->nullable();
            $table->text('Address');
            $table->boolean('Status')->default(0);
            $table->text('Gift')->nullable();
            $table->string('Payment')->nullable();
            $table->integer('preorder_product_id')->unsigned();
            $table->foreign('preorder_product_id')->references('id')->on('Preorder_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preorder_orders');
    }
}
