<?php

namespace Database\Seeders;

use App\Models\ShareApp;
use Illuminate\Database\Seeder;

class ShareAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShareApp::updateOrCreate([
            'id' => 1,
        ],[
            'ios_link'=> 'https://appscorridor.com/queens-of-ten-admin/',
            'android_link' => 'https://appscorridor.com/queens-of-ten-admin/',
            'prize_id' => 1,
            'quantity' => 1,
        ]);
    }
}
