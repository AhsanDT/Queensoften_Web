<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface WalletApiInterface
{
    public function addFund($request):JsonResponse;
    public function buyCoins($request):JsonResponse;
}
