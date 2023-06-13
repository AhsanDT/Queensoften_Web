<?php

namespace App\Repositories\Api;


use App\Models\Achievement;
use App\Models\Challenge;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AchievementApiRepository implements AchievementApiRepositoryInterface {

    use ResponseTrait;
    public function getAchievements($userId): JsonResponse
    {

        try {
            $user = User::find($userId);
            if(!$user)
                return $this->response(false,'User not found!',[], Response::HTTP_UNAUTHORIZED);

            $qry =  Achievement::join('challenges', 'achievements.challenge_id', '=','challenges.id','inner')
                ->select('challenges.title','challenges.date','challenges.hour','challenges.minute','challenges.games','challenges.days',
                    'challenges.occurrence','challenges.active')->where('challenges.active',1)
                ->where('achievements.user_id',$userId)
                ->get();

            $data = [
                'totalChallenges'=> Challenge::where('challenges.active',1)->count(),
                'achievements' => $qry
            ];

            return $this->response(true,'',$data,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
}
