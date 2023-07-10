<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryModeController extends Controller
{
    function index(){
        return view('storymode.index');
    }

    function storyModeDetail(){
        return view('storymode.storymode-detail');
    }

    function storyModeCreate(){
        return view('storymode.create-storymode');
    }


}
