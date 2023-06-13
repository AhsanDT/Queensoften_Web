<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface StatsApiRepositoryInterface
{
    public function create($request,$userId):JsonResponse;
    public function list($userId,$gameType):JsonResponse;
}
