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
        Schema::table('user_challenges', function (Blueprint $table) {
            $table->integer('games')->nullable();
            $table->boolean('complete')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_challenges', function (Blueprint $table) {
            $table->dropColumn('games');
            $table->dropColumn('complete');
        });
    }
};
