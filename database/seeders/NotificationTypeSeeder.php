<?php

namespace Database\Seeders;

use App\Models\NotificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationTypeSeeder extends Seeder
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
                'message' => 'Signed up the queens of ten app.',
                'type' => 'signed up',
                'slug' => 'signed-up',
                'icon' => "fas fa-comment-dots"
            ],
            [
                'id' =>2,
                'message' => 'Just joined the queens of ten app.',
                'type' => 'joined',
                'slug' => 'joined',
                'icon' => "fas fa-comment-dots"

            ],
            [
                'id' =>3,
                'message' => 'Sent you a message 📪 ',
                'type' => 'message',
                'slug' => 'message',
                'icon' => "fas fa-envelope"
            ]
        ];

        NotificationType::insert($data);
    }
}
