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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('drop_hand')->default(0);
            $table->integer('wins');
            $table->integer('win_rewarded');
            $table->boolean('claimed');
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
            $table->dropColumn('drop_hand');
            $table->dropColumn('wins');
            $table->dropColumn('win_rewarded');
            $table->dropColumn('claimed');
        });
    }
};
