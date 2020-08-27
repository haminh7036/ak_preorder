<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreOrderSpecifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorder_specifications', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('Material')->nullable();
            $table->string('Face_diameter');
            $table->string('Case_diameter');
            $table->string('Type');
            $table->string('Frame')->nullable();
            $table->string('Wire_Material')->nullable();
            $table->string('Wire_Width')->nullable();
            $table->string('Waterproof')->nullable();
            $table->string('Energy_Sources');
            $table->string('Battery_life_time');
            $table->string('User_Object');
            $table->string('Trademark');
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
        Schema::dropIfExists('preorder_specifications');
    }
}
