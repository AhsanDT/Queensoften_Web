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
        DB::table('subscriptions')->truncate();
        $data = [
            [
                'name' => 'free User',
                'duration'=>'1 month',
                'price'=>0
            ],
            [
                'name' => 'Premium User',
                'duration'=>'1 month',
                'price'=>2.99
            ],
            [
                'name' => 'Premium User',
                'duration'=>'1 year',
                'price'=>34.59
            ],
        ];
        DB::table('subscriptions')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('subscriptions')->truncate();
    }
};
