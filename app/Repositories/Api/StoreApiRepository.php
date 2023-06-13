<?php

namespace App\Repositories\Api;


use App\Models\Purchase;
use App\Models\Statistics;
use App\Models\Item;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;

class StoreApiRepository implements StoreApiRepositoryInterface
{
    use ResponseTrait;

    protected $model;

    public function __construct(Item $model){
        $this->model = $model;
    }
    function items(): JsonResponse
    {
        try {
            $store = $this->model->get();
            return $this->response(true,'',$store, Response::HTTP_OK);
        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    function userItems($userId): JsonResponse
    {
        try {
            $userItems = Purchase::select('items.name as item_name','purchases.item_id','items.type','purchases.quantity','items.image')->where('user_id',$userId)
                ->join('items', 'purchases.item_id', '=','items.id','inner')->get();
            return $this->response(true,'',$userItems, Response::HTTP_OK);
        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    function purchase($request, $userId): JsonResponse
    {

        try {
            $item = Item::find($request->item_id);

            $user = User::find($userId);

            if(!$user){
                return $this->response(false,'User not found.',[], Response::HTTP_UNAUTHORIZED);
            }
            if(!$item){
                return $this->response(false,'Item not found.',[], Response::HTTP_UNAUTHORIZED);
            }

            $purchase = Purchase::where('user_id',$userId)->where('item_id',$request->item_id)->first();

            if($purchase){
                $purchase->quantity = $purchase->quantity + $request->quantity;
            }else{
                $purchase = new Purchase();
                $purchase->user_id = $userId;
                $purchase->item_id = $request->item_id;
                $purchase->quantity = $purchase->quantity + $request->quantity;
            }
            $purchase->save();

            return $this->response(true,'',$purchase, Response::HTTP_OK);
        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function itemUse($request,$userId):JsonResponse
    {
        try {

            $item = Item::find($request->item_id);
            if(!$item){
                return $this->response(false,'Item not found.',[], Response::HTTP_UNAUTHORIZED);
            }

            $userItem = Purchase::where('user_id',$userId)->where('item_id',$request->item_id)->first();

            if($userItem){
                $userItem->quantity = $userItem->quantity - 1;
                $userItem->save();

                if($userItem->quantity == 0){
                    $userItem->delete();
                }

                return $this->response(true,'Quantity minus from item.',$userItem ?? [], Response::HTTP_OK);
            }

            return $this->response(false,'User item not found.',[], Response::HTTP_UNAUTHORIZED);
        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }

    }
    public function skinUse($request,$userId):JsonResponse
    {
        try{

            $user = User::find($userId);

            if(!$user){
                return $this->response(false,'User not found.',[], Response::HTTP_UNAUTHORIZED);
            }

            $user->skin = $request->item_id;
            $user->save();

            return $this->response(true,'Skin changed successfully',$user, Response::HTTP_OK);

        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
}
