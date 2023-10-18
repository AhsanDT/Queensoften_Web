<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // dd(12);
        return view('home.index');
    }
    public function billing(){
        // dd(12);
        return view('home.billingaddress');
    }
    public function tutorial(){
        // dd(12);
        return view('home.tutorial');
    }
    public function story(){
        // dd(12);
        return view('home.story');
    }
    public function signup(){
        // dd(12);
        return view('home.signup');
    }
    public function signin(){
        // dd(12);
        return view('home.signin');
    }
    public function product(){
        // dd(12);
        return view('home.product');
    }
    public function mywallet(){
        // dd(12);
        return view('home.mywallet');
    }
    public function manageaccount(){
        // dd(12);
        return view('home.manageaccount');
    }
    public function editprofile(){
        // dd(12);
        return view('home.editprofile');
    }
    public function contactus(){
        // dd(12);
        return view('home.contactus');
    }

}
