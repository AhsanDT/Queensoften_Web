<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Deck;
use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\Skin;
use App\Models\StoryMode;
use App\Models\Suit;
use App\Models\Tutorial;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user_id = Auth::user()->id;
        $billings = Billing::where('user_id',$user_id)->get();
        if (isset($billings[0])){
            $billing = $billings[0];
            return view('home.billingaddress',compact('billing'));
        }else{
            return view('home.billingaddress');
        }
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
    public function mywallet($id){
        $user = User::find($id);
        $wallets = Wallet::where('user_id',$id)->get();
        return view('home.mywallet',compact('user','wallets'));
    }
    public function reachaudience(){
        return view('home.reachaudience');
    }
    public function crossAdvertisement(){
        return view('home.corssadvertisement');
    }
    public function performance(){
        return view('home.performence');
    }
    public function terms(){
        return view('home.terms');
    }
    public function form(){
        return view('home.form');
    }
    public function manageaccount($id){
        $user = User::find($id);
        $wallets = Wallet::where('user_id',$id)->get();
        $billings = Billing::where('user_id',$id)->get();
        if (isset($billings[0])){
            $billing = $billings[0];
            return view('home.manageaccount',compact('user','wallets','billing'));
        }else{
            return view('home.manageaccount',compact('user','wallets'));
        }
    }
    public function editprofile(){
        $user = Auth::user();
        return view('home.editprofile',compact('user'));
    }
    public function contactus(){
        return view('home.contactus');
    }
    public function billingStore(Request $request){
//        dd($request->all());
        $user_id = Auth::user()->id;
        $billing = Billing::where('user_id', $user_id)->first();
        if ($billing){
            $billing->update([
                'name'=>$request->name,
                'l_name'=>$request->l_name,
                'phone'=>$request->number,
                'notes'=>$request->notes,
                'address'=>$request->address,
                'apartment'=>$request->appartment,
                'zip'=>$request->zip,
                'country'=>$request->country,
                'location'=>$request->location,
                'user_id'=>$user_id,
            ]);
        }else{
            $billing = Billing::create([
                'name'=>$request->name,
                'l_name'=>$request->l_name,
                'phone'=>$request->number,
                'notes'=>$request->notes,
                'address'=>$request->address,
                'apartment'=>$request->appartment,
                'zip'=>$request->zip,
                'country'=>$request->country,
                'location'=>$request->location,
                'user_id'=>$user_id,
            ]);
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Updated Successfully',
                'status_code' => 200,
            ]
        );
    }
    public function updateprofile(Request $request){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if($user){
            $user->update([
                'name'=>$request->name,
                'l_name'=>$request->l_name,
                'email'=>$request->email,
                'dob'=>$request->dob,
                'phone'=>$request->phone
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Updated Successfully',
                    'status_code' => 200,
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => true,
                    'message' => 'User not found',
                    'status_code' => 404,
                ]
            );
        }

    }
}
