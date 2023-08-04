<?php

namespace App\Repositories\Api;

use App\Models\Subscription;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionApiRepository implements SubscriptionApiInterface
{
    use ResponseTrait;
    protected $model;
    protected $day;
    protected $date;

    public function __construct(Subscription $model){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->day =  date('l');
    }
    public function list(): JsonResponse
    {
        try {
            $subscriptions =  Subscription::all();
            $data = [
                'count' => $subscriptions->count(),
                'subscriptions' => $subscriptions
            ];
            return $this->response(true,'',$data,Response::HTTP_OK);
        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
    public function subscribe($request): JsonResponse
    {
        if (!isset($request['user_id']) || !isset($request['subscription_id'])) {
            return response()->json(['message' => 'Invalid request data'], 400);
        }
        try {
            $user = User::find($request['user_id']);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $user->subscription_id = $request['subscription_id'];
            $user->save();
            return $this->response(true,'Subscribed Successfully','',Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
}
