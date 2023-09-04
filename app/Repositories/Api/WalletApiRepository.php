<?php

namespace App\Repositories\Api;

use App\Models\Coin;
use App\Models\Deck;
use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\Skin;
use App\Models\Suit;
use App\Models\User;
use App\Models\UserPurchase;
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
    public function buyEstoreItem($request): JsonResponse
    {
        try {
            $user = User::find($request['user_id']);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $type = $request['type'];
            switch($type){
                case "shuffle":
                    $model = Shuffle::find($request['purchase_id']);
                    break;
                case "joker":
                    $model = Joker::find($request['purchase_id']);
                    break;
                case "suit":
                    $model = Suit::find($request['purchase_id']);
                    break;
                case "deck":
                    $model = Deck::find($request['purchase_id']);
                    break;
                case "skin":
                    $model = Skin::find($request['purchase_id']);
                    break;
            }
            if ($user->coins > 0 && $user->coins >= $model->coins){
                $item = UserPurchase::where('user_id',$request['user_id'])->where('purchase_id',$model->id)->where('type',$type)->first();
                if($item){
                    $item->quantity = $item->quantity - 1;
                    $item->save();
                }else{
                    $userPurchase = new UserPurchase();
                    $userPurchase->user_id = $request['user_id'];
                    $userPurchase->type = $type;
                    $userPurchase->purchase_id = $model->id;
                    $userPurchase->quantity = 1;
                    $userPurchase->save();
                }
            }else{
                return $this->response(false,'Insufficient funds','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
            }
            return $this->response(true,'Item purchased Successfully','',Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response(false,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
}
