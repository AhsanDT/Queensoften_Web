<?php

namespace App\Repositories\Api;

use App\Models\Subscription;
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
}
