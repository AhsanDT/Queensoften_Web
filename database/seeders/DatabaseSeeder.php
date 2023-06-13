<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AdminSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(PrizeSeeder::class);
        $this->call(ChallengeSeeder::class);
        $this->call(ShareAppSeeder::class);
        $this->call(NotificationTypeSeeder::class);
    }
}
