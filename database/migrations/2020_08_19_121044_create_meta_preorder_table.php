<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaPreorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_preorder', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('tag_title')->nullable();
            $table->text('tag_description')->nullable();
        });
        Schema::table('preorder_pages', function (Blueprint $table) {
            $table->text('title1')->nullable();
            $table->text('title2')->nullable();
            $table->text('title3')->nullable();
            $table->text('title4')->nullable();
            $table->text('big_banner')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_preorder');\
        Schema::table('preorder_pages', function (Blueprint $table) {
            $table->dropColumn('title1');
            $table->dropColumn('title2');
            $table->dropColumn('title3');
            $table->dropColumn('title4');
            $table->dropColumn('big_banner');
        });
    }
}
