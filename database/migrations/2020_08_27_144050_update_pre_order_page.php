<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePreOrderPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preorder_pages', function (Blueprint $table) {
            $table->text('keywords')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
        });
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->text('keywords')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preorder_pages', function (Blueprint $table) {
            $table->dropColumn('keywords')->nullable();
            $table->dropColumn('title')->nullable();
            $table->dropColumn('description')->nullable();
        });
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn('keywords')->nullable();
            $table->dropColumn('title')->nullable();
            $table->dropColumn('description')->nullable();
        });
    }
}
