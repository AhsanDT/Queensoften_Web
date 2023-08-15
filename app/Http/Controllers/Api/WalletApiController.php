<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\WalletApiInterface;
use Illuminate\Http\Request;

class WalletApiController extends Controller
{
    protected $walletApiRepository;
    public function __construct(WalletApiInterface $walletApiRepository){
        $this->walletApiRepository = $walletApiRepository;
    }
    public function addFund(Request $request){
        return $this->walletApiRepository->addFund($request);
    }
    public function buyCoins(Request $request){
        return $this->walletApiRepository->buyCoins($request);
    }
}
