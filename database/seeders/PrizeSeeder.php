<?php

namespace Database\Seeders;

use App\Models\Prize;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' =>1,
                'name' => 'none',
                'item_id' => 0
            ],
            [
                'id' =>2,
                'name'  =>  'joker',
                'item_id' => 2

            ],
            [
                'id' =>3,
                'name'  =>  'shuffle',
                'item_id' => 1

            ]
        ];

        Prize::insert($data);
    }
}
