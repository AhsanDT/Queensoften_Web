<?php
namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface AchievementApiRepositoryInterface{
   public function getAchievements($userId):JsonResponse;
}
