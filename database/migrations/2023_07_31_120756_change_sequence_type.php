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
        Schema::table('tutorials', function (Blueprint $table) {
            $table->integer('sequence')->nullable()->default(0)->change();
            \DB::table('tutorials')->update(['sequence' => 0]);
            \DB::statement('ALTER TABLE tutorials ALTER COLUMN sequence TYPE INTEGER USING sequence::integer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutorials', function (Blueprint $table) {
            $table->string('sequence')->change();
        });
    }
};
