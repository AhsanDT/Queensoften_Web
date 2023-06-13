<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('email','queens10dev@gmail.com')->first();

        if(!$admin){
            $save = new Admin();
            $save->name = 'Admin';
            $save->email = 'queens10dev@gmail.com';
            $save->picture = 'https://github.com/mdo.png';
            $save->password = Hash::make('Queens10@');
            $save->save();
        }
    }
}
