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
                'name' => 'Free User',
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

        $subscription = Subscription::count();
        if (!$subscription){
            Subscription::insert($data);
        }
    }
}
