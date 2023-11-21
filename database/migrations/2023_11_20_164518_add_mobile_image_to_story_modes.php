<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('story_modes', function (Blueprint $table) {
            $table->string('mobile_image')->nullable();
        });
        Schema::table('shuffles', function (Blueprint $table) {
            $table->string('mobile_image')->nullable();
        });
        Schema::table('jokers', function (Blueprint $table) {
            $table->string('mobile_image')->nullable();
        });
        Schema::table('suits', function (Blueprint $table) {
            $table->string('mobile_image')->nullable();
        });
        Schema::table('decks', function (Blueprint $table) {
            $table->string('mobile_image')->nullable();
        });
        Schema::table('skins', function (Blueprint $table) {
            $table->string('mobile_image')->nullable();
        });
        Schema::table('tutorials', function (Blueprint $table) {
            $table->string('mobile_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('story_modes', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
        });
        Schema::table('shuffles', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
        });
        Schema::table('jokers', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
        });
        Schema::table('suits', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
        });
        Schema::table('decks', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
        });
        Schema::table('skins', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
        });
        Schema::table('tutorials', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
        });
    }
};
