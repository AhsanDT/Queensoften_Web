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
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('hour')->nullable();
            $table->string('minute')->nullable();
            $table->longText('title')->nullable();
            $table->string('games')->nullable();
            $table->longText('days')->nullable();
            $table->longText('occurrence')->nullable();
            $table->integer('prize_id')->nullable();
            $table->longText('quantity')->nullable();
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
};
