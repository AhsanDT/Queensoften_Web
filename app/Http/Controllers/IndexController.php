<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index(){
        $totalPlayers = User::count();
        return view('index',compact('totalPlayers'));
    }
}
