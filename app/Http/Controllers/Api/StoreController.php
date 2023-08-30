<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Repositories\Api\StoreApiRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $storeRepositoryInterface;

    public function __construct(StoreApiRepositoryInterface $storeRepositoryInterface){
        $this->storeRepositoryInterface = $storeRepositoryInterface ;
    }
    function items():JsonResponse
    {
        return $this->storeRepositoryInterface->items();
    }
    function purchase(PurchaseRequest $request,$userId):JsonResponse
    {
        return $this->storeRepositoryInterface->purchase($request,$userId);
    }
    function userItems($userId):JsonResponse
    {
        return $this->storeRepositoryInterface->userItems($userId);
    }
    function itemUse(Request $request,$userId): JsonResponse
    {
        return $this->storeRepositoryInterface->itemUse($request,$userId);
    }
    function skinUse(PurchaseRequest $request,$userId): JsonResponse
    {
        return $this->storeRepositoryInterface->skinUse($request,$userId);
    }
}
