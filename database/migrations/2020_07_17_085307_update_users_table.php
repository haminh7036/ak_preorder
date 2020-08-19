<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->after('remember_token')->nullable();
            $table->string('phone')->after('remember_token')->nullable();
            $table->string('mobile_phone')->after('remember_token')->nullable();
            $table->boolean('gender')->after('remember_token')->nullable();
            $table->string('avatar')->after('remember_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('mobile_phone');
            $table->dropColumn('gender');
            $table->dropColumn('avatar');
        });
    }
}
