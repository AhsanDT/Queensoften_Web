<?php

namespace App\Traits;

use App\Models\Notification;
use Illuminate\Http\JsonResponse;

trait NotificationTrait
{
    public function notification_save($userId,$type)
    {
       return  Notification::create([
            'user_id' => $userId,
            'notification_type_id' => $type,
        ]);
    }

}
