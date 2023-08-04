<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface SubscriptionApiInterface
{
    public function list():JsonResponse;
    public function subscribe($request):JsonResponse;
}
