<?php

namespace App\Repositories\Api;

use App\Models\Coin;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class WalletApiRepository implements WalletApiInterface
{
    use ResponseTrait;
    protected $model;
    protected $day;
    protected $date;

    public function __construct(Wallet $model){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->day =  date('l');
    }
    public function addFund($request): JsonResponse
    {
        try {
            $user = User::find($request['user_id']);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $wallet = new Wallet();
            $wallet->user_id = $request['user_id'];
            $wallet->type = 'debit';
            $wallet->amount = $request['amount'];
            $wallet->purchase_type = 'usd';
            $wallet->save();
            $user->usd += $request['amount'];
            $user->save();
            return $this->response(true,'Funds Added Successfully','',Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response(false,$e->getMessage(),'Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
    public function buyCoins($request): JsonResponse
    {
        try {
            $user = User::find($request['user_id']);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $coins = Coin::find($request['coin_id']);
            if ($user->usd > 0 && $user->usd >= $coins->price){
                $wallet = new Wallet();
                $wallet->user_id = $request['user_id'];
                $wallet->type = 'credit';
                $wallet->amount = $coins->price;
                $wallet->purchase_type = 'coins';
                $wallet->save();
                $user->usd -= $coins->price;
                $user->coins += $coins->coins;
                $user->save();
            }else{
                return $this->response(false,'Insufficient funds','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
            }
            return $this->response(true,'Coins Purchased Successfully','',Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response(false,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
}
