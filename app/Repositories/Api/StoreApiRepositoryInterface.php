<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface StoreApiRepositoryInterface
{
    public function items():JsonResponse;
    public function purchase($request,$userId):JsonResponse;
    public function userItems($userId):JsonResponse;
    public function itemUse($request,$userId):JsonResponse;
    public function skinUse($request,$userId):JsonResponse;
}
