<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionWinnerController extends Controller
{
    function index(){
        return view('subscription-winner.index');
    }

}
