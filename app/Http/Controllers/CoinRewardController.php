<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoinRewardController extends Controller
{
    public function index(){
        return view('coin-reward.index');
    }
}
