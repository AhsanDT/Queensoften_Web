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
        Schema::create('challenge_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challenge_id')->nullable();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('sub_type')->nullable();
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
        Schema::dropIfExists('challenge_attachments');
    }
};
