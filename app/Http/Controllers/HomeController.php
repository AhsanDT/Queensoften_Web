<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deck;
use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\Skin;
use App\Models\StoryMode;
use App\Models\Suit;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $tutorials = Tutorial::take(4)->get();
        $shuffles = Shuffle::all();
        $jokers = Joker::all();
        $suits = Suit::all();
        $decks = Deck::all();
        $skins = Skin::all();
        $shuffles = $shuffles->map(function ($item) {
            $item['origin'] = 'Shuffles';
            return $item;
        });

        $jokers = $jokers->map(function ($item) {
            $item['origin'] = 'Jokers';
            return $item;
        });

        $suits = $suits->map(function ($item) {
            $item['origin'] = 'Suits';
            return $item;
        });

        $decks = $decks->map(function ($item) {
            $item['origin'] = 'Decks';
            return $item;
        });

        $skins = $skins->map(function ($item) {
            $item['origin'] = 'Skins';
            return $item;
        });
        $allItems = $shuffles->concat($jokers)->concat($suits)->concat($decks)->concat($skins);
        $allItems = $allItems->sortByDesc('created_at');
        $recentItems = $allItems->take(3);
//        dd($recentItems);
        return view('home.index',compact('tutorials','recentItems'));
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
        $shuffles = Shuffle::all();
        $jokers = Joker::all();
        $suits = Suit::all();
        $decks = Deck::all();
        $skins = Skin::all();
        $shuffles = $shuffles->map(function ($item) {
            $item['origin'] = 'Shuffles';
            return $item;
        });

        $jokers = $jokers->map(function ($item) {
            $item['origin'] = 'Jokers';
            return $item;
        });

        $suits = $suits->map(function ($item) {
            $item['origin'] = 'Suits';
            return $item;
        });

        $decks = $decks->map(function ($item) {
            $item['origin'] = 'Decks';
            return $item;
        });

        $skins = $skins->map(function ($item) {
            $item['origin'] = 'Skins';
            return $item;
        });
        $allItems = $shuffles->concat($jokers)->concat($suits)->concat($decks)->concat($skins);
        $allItems = $allItems->sortByDesc('created_at');
        return view('home.product',compact('allItems'));
    }
    public function mywallet(){
        return view('home.mywallet');
    }
    public function reachaudience(){
        return view('home.reachaudience');
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
