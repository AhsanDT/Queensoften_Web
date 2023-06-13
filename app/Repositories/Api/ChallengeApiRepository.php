<?php

namespace App\Repositories\Api;


use App\Models\Achievement;
use App\Models\Challenge;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ChallengeApiRepository implements ChallengeApiRepositoryInterface
{
    use ResponseTrait;
    protected $model;
    protected $day;
    protected $date;

    public function __construct(Challenge $model){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->day =  date('l');
    }

    public function list(): JsonResponse
    {
        try {
            $challenges =  Challenge::join('prizes', 'challenges.prize_id', '=','prizes.id','inner')
                ->select('challenges.title','challenges.date','challenges.hour','challenges.minute','challenges.games','challenges.days',
                    'challenges.occurrence','challenges.active','prizes.name as prize')->where('challenges.active',1)->get();

            $data = [
                'count' => $challenges->count(),
                'challenges' => $challenges
            ];

            return $this->response(true,'',$data,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }

    }
    public function get($userId): JsonResponse
    {
        try {
            $user = User::find($userId);
            if(!$user)
                return $this->response(false,'User not found!',[], Response::HTTP_UNAUTHORIZED);


            $challenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
                ->select('challenges.id','challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games', 'challenges.days',
                    'challenges.occurrence', 'challenges.weekly', 'challenges.monthly', 'challenges.active', 'prizes.name as prize','challenges.hard_coded')->where('challenges.active', 1)
                ->where('visibility',1);

            $weeklyChallenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
                ->select('challenges.id','challenges.hard_coded','challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games', 'challenges.days',
                    'challenges.occurrence', 'challenges.weekly', 'challenges.monthly', 'challenges.active', 'prizes.name as prize','challenges.hard_coded')->where('challenges.active', 1)
                ->where('challenges.occurrence','Weekly')
                ->where('visibility',1);


            $monthlyChallenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
                ->select('challenges.id','challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games', 'challenges.days',
                    'challenges.occurrence', 'challenges.weekly', 'challenges.monthly', 'challenges.active', 'prizes.name as prize','challenges.hard_coded')->where('challenges.active', 1)
                ->where('challenges.occurrence','Monthly')
                ->where('visibility',1);

            $todayChallenge = null;

            foreach ($monthlyChallenges->get() as $monthlyChallenge) {
                if ($monthlyChallenge->monthly == $this->date) {
                    if (!$this->checkUserAchieveChallenge($monthlyChallenge->id, $userId)) {
                        $modal          = new Challenge();
                        $modal->exists  = true;
                        $modal->id      = $monthlyChallenge->id;
                        $modal->monthly  =   date('m-d-Y',strtotime('+1 month'));
                        $modal->save();
                        break;
                    }
                    continue;
                }
            }

            if(!$todayChallenge) {
                foreach ($weeklyChallenges->get() as $weeklyChallenge) {
                    if ($weeklyChallenge->weekly == $this->date) {
                        if (!$this->checkUserAchieveChallenge($weeklyChallenge->id, $userId)) {
                            $todayChallenge = $weeklyChallenge;
                            $modal          = new Challenge();
                            $modal->exists  = true;
                            $modal->id      = $weeklyChallenge->id;
                            $modal->weekly  = date('m-d-Y',strtotime('+7 days'));
                            $modal->save();
                            break;
                        }
                        continue;
                    }
                }
            }
            if(!$todayChallenge) {
                foreach ($challenges->get() as $challenge) {

                    if ($challenge->date == $this->date) {
                        if (!$this->checkUserAchieveChallenge($challenge->id, $userId)) {
                            $todayChallenge = $challenge;
                            break;
                        }
                        continue;
                    }
                    if (in_array($this->day, json_decode($challenge->days), true)) {

                        if (!$this->checkUserAchieveChallenge($challenge->id, $userId)) {
                            $todayChallenge = $challenge;
                            break;
                        }
                        continue;
                    }
                }
            }
            $data = [
                'challenge' => $todayChallenge
            ];

            return $this->response(true,'',$data,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }

    }
    public function checkUserAchieveChallenge($challengeId,$userId){
        $flag = false;
        $achievement =  Achievement::where('challenge_id',$challengeId)
            ->where('user_id',$userId)
            ->first();
        if($achievement) {
            $flag = true;
        }
        return $flag;
    }
}
