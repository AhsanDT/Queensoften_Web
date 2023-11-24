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
        Schema::table('shuffles', function (Blueprint $table) {
            $table->decimal('price')->nullable();
        });
        Schema::table('jokers', function (Blueprint $table) {
            $table->decimal('price')->nullable();
        });
        Schema::table('suits', function (Blueprint $table) {
            $table->decimal('price')->nullable();
        });
        Schema::table('decks', function (Blueprint $table) {
            $table->decimal('price')->nullable();
        });
        Schema::table('skins', function (Blueprint $table) {
            $table->decimal('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shuffles', function (Blueprint $table) {
            $table->dropColumn('price');
        });
        Schema::table('jokers', function (Blueprint $table) {
            $table->dropColumn('price');
        });
        Schema::table('suits', function (Blueprint $table) {
            $table->dropColumn('price');
        });
        Schema::table('decks', function (Blueprint $table) {
            $table->dropColumn('price');
        });
        Schema::table('skins', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};
