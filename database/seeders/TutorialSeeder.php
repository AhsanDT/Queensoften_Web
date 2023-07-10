<?php

namespace Database\Seeders;

use App\Models\Tutorial;
use Illuminate\Database\Seeder;

class TutorialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'image' => url('items/shuffles_icon.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere quam sit amet rhoncus dapibus. Integer pulvinar mauris leo, et imperdiet mauris ullamcorper id. Nunc eu nunc eu mauris consequat auctor. Sed vehicula quam elit, vel imperdiet tellus vulputate id. Nulla lacinia sed diam sit amet convallis. Aliquam rutrum pellentesque.',
            ],
            [
                'id' => 2,
                'image' => url('items/joker_icon.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vestibulum aliquam gravida. Suspendisse elementum nunc ac turpis malesuada eleifend. Praesent orci augue, ornare in ligula a, pretium lacinia quam. Donec eget ullamcorper ex. Sed tellus mi, facilisis tempus nulla vitae, venenatis maximus enim. Fusce sed ante nunc. Nullam suscipit nibh.',
            ],
        ];
        Tutorial::insert($data);

    }
}
