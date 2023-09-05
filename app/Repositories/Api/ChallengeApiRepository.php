<?php

namespace App\Repositories\Api;


use App\Models\Achievement;
use App\Models\Challenge;
use App\Models\ChallengeAttachment;
use App\Models\Statistics;
use App\Models\User;
use App\Models\UserChallenge;
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
            $challenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
                ->leftJoin('challenge_attachments', 'challenges.id', '=', 'challenge_attachments.challenge_id')
                ->select('challenges.id', 'challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games', 'challenges.days',
                    'challenges.occurrence', 'challenges.active', 'prizes.name as prize', 'challenges.deck','challenges.description','challenges.quantity')
                ->with('special_cards') // Eager load the special_cards relationship
                ->where('challenges.active', 1)
                ->get()
                ->groupBy('id'); // Group the results by challenge id

            $challengesWithAttachments = [];

            foreach ($challenges as $challengeId => $challengeData) {
                $challenge = $challengeData->first(); // Since challenges have the same data, just take the first one
                $attachments = $challengeData->pluck('special_cards')->flatten()->toArray();
                $challenge['attachments'] = $attachments;
                $challenge['top_wins'] = UserChallenge::where('challenge_id', $challengeId)
                    ->where('win', true)
                    ->orderBy('created_at', 'desc')
                    ->take(1)
                    ->get();

                $challenge['top_times'] = Statistics::where('game_type', 'challenge')
                ->where('challenge_id', $challengeId)
                    ->orderBy('score', 'desc')
                    ->take(1)
                    ->get();
                $challengesWithAttachments[] = $challenge;
            }

            $data = [
                'count' => count($challengesWithAttachments),
                'challenges' => $challengesWithAttachments
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


//            $challenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
//                ->select('challenges.id','challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games', 'challenges.days',
//                    'challenges.occurrence', 'challenges.weekly', 'challenges.monthly', 'challenges.active', 'prizes.name as prize','challenges.hard_coded')->where('challenges.active', 1)
//                ->where('visibility',1);
//
//            $weeklyChallenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
//                ->select('challenges.id','challenges.hard_coded','challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games', 'challenges.days',
//                    'challenges.occurrence', 'challenges.weekly', 'challenges.monthly', 'challenges.active', 'prizes.name as prize','challenges.hard_coded')->where('challenges.active', 1)
//                ->where('challenges.occurrence','Weekly')
//                ->where('visibility',1);
//
//
//            $monthlyChallenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
//                ->select('challenges.id','challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games', 'challenges.days',
//                    'challenges.occurrence', 'challenges.weekly', 'challenges.monthly', 'challenges.active', 'prizes.name as prize','challenges.hard_coded')->where('challenges.active', 1)
//                ->where('challenges.occurrence','Monthly')
//                ->where('visibility',1);
//
//            $todayChallenge = null;
//
//            foreach ($monthlyChallenges->get() as $monthlyChallenge) {
//                if ($monthlyChallenge->monthly == $this->date) {
//                    if (!$this->checkUserAchieveChallenge($monthlyChallenge->id, $userId)) {
//                        $modal          = new Challenge();
//                        $modal->exists  = true;
//                        $modal->id      = $monthlyChallenge->id;
//                        $modal->monthly  =   date('m-d-Y',strtotime('+1 month'));
//                        $modal->save();
//                        break;
//                    }
//                    continue;
//                }
//            }
//
//            if(!$todayChallenge) {
//                foreach ($weeklyChallenges->get() as $weeklyChallenge) {
//                    if ($weeklyChallenge->weekly == $this->date) {
//                        if (!$this->checkUserAchieveChallenge($weeklyChallenge->id, $userId)) {
//                            $todayChallenge = $weeklyChallenge;
//                            $modal          = new Challenge();
//                            $modal->exists  = true;
//                            $modal->id      = $weeklyChallenge->id;
//                            $modal->weekly  = date('m-d-Y',strtotime('+7 days'));
//                            $modal->save();
//                            break;
//                        }
//                        continue;
//                    }
//                }
//            }
//            if(!$todayChallenge) {
//                foreach ($challenges->get() as $challenge) {
//
//                    if ($challenge->date == $this->date) {
//                        if (!$this->checkUserAchieveChallenge($challenge->id, $userId)) {
//                            $todayChallenge = $challenge;
//                            break;
//                        }
//                        continue;
//                    }
//                    if (in_array($this->day, json_decode($challenge->days), true)) {
//
//                        if (!$this->checkUserAchieveChallenge($challenge->id, $userId)) {
//                            $todayChallenge = $challenge;
//                            break;
//                        }
//                        continue;
//                    }
//                }
//            }
            $challenges = Challenge::join('prizes', 'challenges.prize_id', '=', 'prizes.id', 'inner')
                ->select('challenges.id', 'challenges.title', 'challenges.date', 'challenges.hour', 'challenges.minute', 'challenges.games','challenges.description','challenges.quantity', 'challenges.days',
                    'challenges.occurrence', 'challenges.weekly', 'challenges.monthly', 'challenges.active', 'prizes.name as prize', 'challenges.hard_coded')
                ->where('challenges.active', 1)
                ->where('visibility', 1);

            // Get the top 3 challenges for today that are not in user_challenges
            $todayChallenges = $challenges->where('challenges.date', $this->date)
                ->whereNotIn('challenges.id', function ($query) use ($userId) {
                    $query->select('challenge_id')->from('user_challenges')->where('user_id', $userId);
                })
                ->orderBy('challenges.id')
                ->take(3)
                ->get();
            foreach ($todayChallenges as $challenge) {
                $topUser = $this->getTopUserForChallenge($challenge->id);
                $challenge->top_user = $topUser ? $topUser->name : null;
            }
            $data = [
                'challenge' => $todayChallenges
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
    private function getTopUserForChallenge($challengeId)
    {
        return UserChallenge::select('users.name')
            ->join('users', 'user_challenges.user_id', '=', 'users.id')
            ->where('user_challenges.challenge_id', $challengeId)
            ->where('user_challenges.status', 1)
            ->orderByDesc('user_challenges.score')
            ->orderBy('user_challenges.time')
            ->first();
    }

}
