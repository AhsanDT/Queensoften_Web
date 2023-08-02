<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
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
                'name' => 'free',
                'duration'=>'1 month',
                'price'=>null
            ],
            [
                'name' => 'free',
                'duration'=>'1 month',
                'price'=>2.99
            ],
            [
                'name' => 'free',
                'duration'=>'1 year',
                'price'=>34.59
            ],
        ];

        Subscription::insert($data);
    }
}
