<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait AchievementTrait
{
    public function achievementResponse($challenge): array
    {
        return [
            'challenge_title' => $challenge->title,
            'prize' => $challenge->hasPrize->name ?? 'none',
            'item_id' => $challenge->hasPrize->item_id ?? 0,
            'quantity' => $challenge->hasPrize->item_id ?? 0,
        ];
    }

}
