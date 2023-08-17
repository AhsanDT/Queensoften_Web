<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface UserRewardApiInterface
{
    public function store($request):JsonResponse;
}
