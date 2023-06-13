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
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->string('support_ticket_id')->nullable();
            $table->boolean('resolved')->default(0);
            $table->bigInteger('admin')->nullable();
            $table->longText('attachment')->nullable();
            $table->boolean('reply')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropColumn('support_ticket_id');
            $table->dropColumn('resolved');
            $table->dropColumn('admin');
            $table->dropColumn('attachment');
            $table->dropColumn('reply');
        });
    }
};
