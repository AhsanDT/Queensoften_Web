<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\AchievementApiRepositoryInterface;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    protected $achievementApiRepository;
    public function __construct(AchievementApiRepositoryInterface $achievementApiRepository){
        $this->achievementApiRepository = $achievementApiRepository;
    }
    public function getAchievement($userId){
       return $this->achievementApiRepository->getAchievements($userId);
    }
}
