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
            if ($request->game_type == 'Challenge') {
                $challenge = Challenge::find($request->challenge_id);
                $user_challenge_exist = UserChallenge::where('user_id', $userId)->where('challenge_id', $request->challenge_id)->first();
                if ($request->won == 1) {
                    if ($user_challenge_exist) {
                        if ($user_challenge_exist->games < $challenge->games) {
                            $user_challenge_exist->games = $user_challenge_exist->games + 1;
                            if ($user_challenge_exist->games == $challenge->games) {
                                $user_challenge_exist->complete = true;
                                $user_challenge_exist->status = false;
                            }
                            $user_challenge_exist->save();
                        }
                    } else {
                        $challenge_complete = false;
                        if ($challenge->games == 1) {
                            $challenge_complete = true;
                        }
                        $user_challenge = UserChallenge::create([
                            'user_id' => $userId,
                            'challenge_id' => $request->challenge_id,
                            'win' => $request->won,
                            'status' => true,
                            'games' => 1, // Set a default value of 1 for games
                            'complete' => $challenge_complete, // Set a default value for complete
                        ]);
                    }
                }
            }
            if ($request->win == 1){
                if($user->wins % 150 === 0){
                    $firstSuit = Suit::first();
                    $item = UserPurchase::where('user_id',$userId)->where('purchase_id',$firstSuit)->where('type','suit')->first();
                    if($item){
                        $item->quantity = $item->quantity + 1;
                        $item->save();
                    }else{
                        $suitPurchase = new UserPurchase([
                            'user_id' => $userId,
                            'type' => 'suit',
                            'purchase_id' => $firstSuit,
                            'quantity' => 1,
                        ]);
                        $suitPurchase->save();
                    }
                }
                $user->wins += 1;
            }
            if($stats){
                $achievementUnlock= null;
                if(isset($request->challenge_id)){
                    $achievementUnlock = $this->unlockAchievement($request->challenge_id,$user,$request->hardcoded,$request);
                }
                if($achievementUnlock){
                    $challenges = Challenge::find($request->challenge_id);
                    $user_challenge_exists = UserChallenge::where('user_id',$userId)->where('challenge_id',$request->challenge_id)->first();
                    if ($user_challenge_exists->games == $challenges->games) {
                        return $this->response(true, 'Achievement Unlocked', $achievementUnlock, Response::HTTP_OK);
                    }else{
                        return $this->response(true, 'Achievement still locked', $achievementUnlock, Response::HTTP_OK);
                    }
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
        $months = range(1, 12);

        $monthNames = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        $allStatistics = Statistics::all(); // Fetch all records

        $topUsersMonthly = [];

        foreach ($months as $month) {
            $filteredStatistics = $allStatistics->filter(function ($statistic) use ($currentYear, $month) {
                $statisticDate = Carbon::createFromFormat('m-d-Y', $statistic->date); // Adjust format as needed
                return $statisticDate->year == $currentYear && $statisticDate->month == $month;
            });

            $userStats = [];

            foreach ($filteredStatistics as $statistic) {
                $userId = $statistic->user_id;

                if (!isset($userStats[$userId])) {
                    $user = User::find($userId);
                    $userStats[$userId] = [
                        'username' => $user->username,
                        'won' => 0,
                        'total' => 0,
                    ];
                }

                $userStats[$userId]['won'] += $statistic->won;
                $userStats[$userId]['total']++;
            }

            foreach ($userStats as &$userStat) {
                $userStat['win_percentage'] = ($userStat['total'] > 0) ?
                    ($userStat['won'] / $userStat['total']) * 100 : 0;
            }

            // Sort userStats by win_percentage in descending order
            usort($userStats, function ($a, $b) {
                return $b['win_percentage'] - $a['win_percentage'];
            });

            $topUsersMonthly[] = [
                'month' => $monthNames[$month],
                'data' => $userStats,
            ];

            // Stop iterating if the current month is reached
            if ($month == $currentMonth) {
                break;
            }
        }
        return $this->response(true,'top ten users in current month',$topUsersMonthly,Response::HTTP_OK);
    }
}
