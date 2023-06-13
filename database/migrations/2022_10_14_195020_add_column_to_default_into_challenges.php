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
        Schema::table('challenges', function (Blueprint $table) {
            $table->boolean('default')->default(0);
            $table->string('play')->nullable();
            $table->string('weekly')->nullable();
            $table->string('monthly')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->dropColumn('default');
            $table->dropColumn('play');
            $table->dropColumn('weekly');
            $table->dropColumn('monthly');
        });
    }
};
