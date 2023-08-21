<?php

namespace App\Repositories\Api;


use App\Models\Challenge;
use App\Models\Statistics;
use App\Models\Suit;
use App\Models\User;
use App\Models\UserChallenge;
use App\Models\UserPurchase;
use App\Services\AchievementService;
use App\Services\ChallengeService;
use App\Traits\AchievementTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;

class StatsApiRepository implements StatsApiRepositoryInterface
{
    use ResponseTrait;
    use AchievementTrait;
    protected $model;
    protected $date;
    public    $achievementService;
    public    $challengeService;
    public function __construct(Statistics $model,AchievementService $achievementService,ChallengeService $challengeService){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->achievementService = $achievementService;
        $this->challengeService = $challengeService;
    }

    function create($request,$userId): JsonResponse
    {
        try {
            $user = User::find($userId);
            if(!$user)
                return $this->response(false,'User not found!',[], Response::HTTP_UNAUTHORIZED);

            $stats = $this->model::Create([
                'game_type' => $request->game_type,
                'won' => $request->won ?? 0,
                'lost' => $request->lost ?? 0,
                'date' => $request->date ?? null,
                'time' => $request->time ?? null,
                'score' => $request->score ?? 0,
                'user_id' => $userId,
            ]);
            if ($request->game_type ==  'Challenge'){
                $user_challenge = UserChallenge::create([
                    'user_id'=>$userId,
                    'challenge_id'=>$request->challenge_id,
                    'win'=>$request->won,
                    'status'=>true,
                ]);
            }
            if ($request->win == 1){
                if($user->wins % 150 === 0){
                    $firstSuit = Suit::first();
                    $suitPurchase = new UserPurchase([
                        'user_id' => $userId,
                        'type' => 'suit',
                        'purchase_id' => $firstSuit,
                    ]);
                    $suitPurchase->save();
                }
                $user->wins += 1;
            }
            if($stats){
                $achievementUnlock= null;
                if(isset($request->challenge_id)){
                    $achievementUnlock = $this->unlockAchievement($request->challenge_id,$user,$request->hardcoded,$request);
                }
                if($achievementUnlock){
                    return $this->response(true,'Achievement Unlocked',$achievementUnlock, Response::HTTP_OK);
                }

                return $this->response(true,'Statistics saved successfully',$stats, Response::HTTP_OK);
            }
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);

        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function list($userId, $gameType): JsonResponse
    {
        $data = [];
        $stats = DB::table('statistics')
            ->select(DB::raw('date,count(*) as total_played,sum(won) as total_won,sum(lost) as total_lost,sum(won) as current_winning_streak,sum(won) as longest_winning_streak,sum(lost) as longest_losing_streak,round(avg(score),0) as average_score,min(time) as best_time'))
            ->where('user_id','=',$userId)
            ->where('game_type','=',$gameType)
            ->groupBy('date')
            ->limit(10)
            ->get();
        //round((sum(won)/(count(*))*100),2)
        foreach ($stats as $row){
            array_push($data,[
                'date' => $row->date,
                'total_played' => $row->total_played,
                'total_won' => $row->total_won,
                'total_lost' => $row->total_lost,
                'win_percentage' => round(($row->total_won / $row->total_played) * 100,0). ' %',
                'current_winning_streak' => $row->current_winning_streak,
                'longest_winning_streak' => $row->longest_winning_streak,
                'longest_losing_streak' => $row->longest_losing_streak,
                'average_score' => $row->average_score ?? 0,
                'best_time' => $row->best_time ?? "0:00"
            ]);
        }
        return $this->response(true,'',$data,Response::HTTP_OK);
    }
    function unlockAchievement($challenge_id,$user,$hardcoded,$request){
        if(!$this->achievementService->getAchievement($challenge_id,$user->id)) {
            $challenge = $this->challengeService->getChallenge($challenge_id,0);
            if ($challenge) {
                return $this->winchallengeUnderHourMinute($challenge,$user);
            }else if($hardcoded == 1){
                $challenge = $this->challengeService->getChallenge($challenge_id,1);
                if($challenge->play > 0){
                    return  $this->playChallenges($challenge,$user);
                } elseif($request->challenge_win_hardcoded == 1){
                    $this->achievementService->save($challenge,$user);
                   return $this->achievementResponse($challenge);
                }else{
                    return false;
                }
            }
        }
        return false;
    }
    function playChallenges($challenge,$user){
        $statistics = $this->model::where('user_id',$user->id)->where('game_type', 'Challenge')
            ->limit($challenge->play)
            ->orderBy('id','DESC')
            ->get();

        if (count($statistics) == $challenge->play) {
            $this->achievementService->save($challenge,$user);
            return $this->achievementResponse($challenge);

        }
    }
    function winchallengeUnderHourMinute($challenge,$user){
        $timeInSeconds = 0 ;
        $diffInSeconds = 0 ;
        $flag = false;
        if($challenge->games > 0) {
            $statistics = $this->model::where('user_id',$user->id)->where('game_type', 'Challenge')
                ->where('won', 1)
                ->where('date', $this->date)
                ->limit($challenge->games)
                ->orderBy('id','DESC')
                ->get();

            if (count($statistics) == $challenge->games) {

                if(($challenge->minute !=0 || $challenge->hour != 0) || ($challenge->minute !=00 || $challenge->hour != 00)) {
                    foreach ($statistics as $key => $stats) {
                        if ($key == 0) {
                            $timeInSeconds = strtotime($stats->created_at);
                        } else {
                            $timeInSeconds = $timeInSeconds - strtotime($stats->created_at);
                            $diffInSeconds = $diffInSeconds + $timeInSeconds;
                            $timeInSeconds = strtotime($stats->created_at);
                        }
                    }
                    $totalSecond = $challenge->hour * 3600 + $challenge->minute * 60;
                    if ($diffInSeconds < $totalSecond) {
                        $flag = true;
                    }
                }else{
                    $flag = true;
                }

                if($flag){
                    $this->achievementService->save($challenge, $user);
                    return $this->achievementResponse($challenge);
                }

            }
        }
    }
    public function topTen():JsonResponse
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $topTenUsers = Statistics::select('user_id', 'won')
            ->whereYear('date', '=', $currentYear)
            ->whereMonth('date', '=', $currentMonth)
            ->orderBy('won', 'desc')
            ->limit(10)
            ->get();
        foreach ($topTenUsers as $userStats) {
            $user = User::find($userStats->user_id);
            $userStats->user = $user;
        }
        return $this->response(true,'top ten users in current month',$topTenUsers,Response::HTTP_OK);
    }
}
