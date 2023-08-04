<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\SubscriptionApiInterface;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $subscriptionRepository;
    public function __construct(SubscriptionApiInterface $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function list(){
        return $this->subscriptionRepository->list();
    }
}
