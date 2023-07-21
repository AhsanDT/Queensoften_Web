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
        Schema::create('deck_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deck_id');
            $table->foreign('deck_id')->references('id')->on('decks')->onDelete('cascade');
            $table->string('img_type');
            $table->string('img_sub_type');
            $table->string('image');
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
        Schema::dropIfExists('deck_attachments');
    }
};
