<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('subscription_type')->nullable();
        });
        $data = [
            [
                'price' => 0,
                'subscription_type' => 'free',
            ],
            [
                'price' => 2.99,
                'subscription_type' => 'standard',
            ],
            [
                'price' => 34.59,
                'subscription_type' => 'premium',
            ],
        ];

        foreach ($data as $item) {
            DB::table('subscriptions')
                ->where('price', $item['price'])
                ->update(['subscription_type' => $item['subscription_type']]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('subscription_type');
        });
    }
};
