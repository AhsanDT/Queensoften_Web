<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StoryMode;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function billing(){
        return view('home.billingaddress');
    }
    public function tutorial(){
        $tutorials = Tutorial::all();
        return view('home.tutorial',compact('tutorials'));
    }
    public function story(){
        $story_modes = StoryMode::all();
        return view('home.story',compact('story_modes'));
    }
    public function signup(){
        return view('home.signup');
    }
    public function signin(){
        return view('home.signin');
    }
    public function product(){
        return view('home.product');
    }
    public function mywallet(){
        return view('home.mywallet');
    }
    public function manageaccount(){
        return view('home.manageaccount');
    }
    public function editprofile(){
        return view('home.editprofile');
    }
    public function contactus(){
        return view('home.contactus');
    }

}
