<?php

namespace App\Repositories\Api;

use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\User;
use App\Models\UserPurchase;
use App\Models\UserReward;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserRewardApiRepository implements UserRewardApiInterface
{
    use ResponseTrait;
    protected $model;
    protected $day;
    protected $date;

    public function __construct(UserReward $model){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->day =  date('l');
    }
    public function store($request):JsonResponse
    {
        try {
            if($request['type'] == 'coins'){
                $user = User::find($request['user_id']);
                $user->coins += $request['amount'];
                $user->save();
                $reward = UserReward::create(['user_id'=>$request['user_id'],'wheel_id'=>$request['wheel_id'],'type'=>$request['type'],'amount'=>$request['amount']]);
            }elseif($request['type'] == 'small_joker'){
                $joker = Joker::where('type','small')->get()->first();
                $userPurchase = new UserPurchase();
                $userPurchase->user_id = $request['user_id'];
                $userPurchase->type = $request['type'];
                $userPurchase->purchase_id = $joker->id;
                $userPurchase->save();
                $reward = UserReward::create(['user_id'=>$request['user_id'],'wheel_id'=>$request['wheel_id'],'type'=>$request['type'],'amount'=>$request['amount']]);
            }elseif($request['type'] == 'big_joker'){
                $joker = Joker::where('type','big')->get()->first();
                $userPurchase = new UserPurchase();
                $userPurchase->user_id = $request['user_id'];
                $userPurchase->type = $request['type'];
                $userPurchase->purchase_id = $joker->id;
                $userPurchase->save();
                $reward = UserReward::create(['user_id'=>$request['user_id'],'wheel_id'=>$request['wheel_id'],'type'=>$request['type'],'amount'=>$request['amount']]);
            }elseif($request['type'] == 'shuffle'){
                $shuffle = Shuffle::first();
                $userPurchase = new UserPurchase();
                $userPurchase->user_id = $request['user_id'];
                $userPurchase->type = $request['type'];
                $userPurchase->purchase_id = $shuffle->id;
                $userPurchase->save();
                $reward = UserReward::create(['user_id'=>$request['user_id'],'wheel_id'=>$request['wheel_id'],'type'=>$request['type'],'amount'=>$request['amount']]);
            }
            return $this->response(true,'',$reward,Response::HTTP_OK);
        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.','',Response::HTTP_UNAUTHORIZED);
        }
    }
}
