<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengecontentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_contents', function (Blueprint $table) {
            $table->integer('id',true);
            $table->timestamps();
            $table->text('content');
            $table->string('options');
            $table->integer('registrant_id')->index();
            $table->foreign('registrant_id')->references('id')->on('registrants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challengecontent');
    }
}
