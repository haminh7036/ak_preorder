
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('slide_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('images');
            $table->integer('landing_page_id')->index();
            $table->foreign('landing_page_id')->references('id')->on('landing_pages');
        });
        Schema::create('link_videos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('url');
            $table->integer('landing_page_id')->index();
            $table->foreign('landing_page_id')->references('id')->on('landing_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slideimages');
        Schema::dropIfExists('link_videos');

    }
}
