<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Shuffles',
                'image' => url('items/shuffles_icon.png'),
                'price' => 2.99,
                'quantity'=> 1,
                'currency'=> '$',
                'type'=> 'card'
            ],
            [
                'id' => 2,
                'name' => 'Joker',
                'image' => url('items/joker_icon.png'),
                'price' => 2.99,
                'quantity'=> 1,
                'currency'=> '$',
                'type'=> 'card'

            ],
            [
                'id' => 3,
                'name' => 'Earth Suit',
                'image' => url('items/earth_suit_icon.png'),
                'price' => 2.99,
                'quantity'=> 1,
                'currency'=> '$',
                'type'=> 'skin'
            ],
            [
                'id' => 4,
                'name' => 'Rose Suit',
                'image' => url('items/rose_suit_icon.png'),
                'price' => 2.99,
                'quantity'=> 1,
                'currency'=> '$',
                'type'=> 'skin'

            ],
            [
                'id' => 5,
                'name' => 'Sky Suit',
                'image' => url('items/sky_suit.png'),
                'price' => 2.99,
                'quantity'=> 1,
                'currency'=> '$',
                'type'=> 'skin'

            ],
            [
                'id' => 6,
                'name' => 'Royal Suit',
                'image' => url('items/royal_suit.png'),
                'price' => 2.99,
                'quantity'=> 1,
                'currency'=> '$',
                'type'=> 'skin'
            ]
        ];

        Item::insert($data);

    }
}
