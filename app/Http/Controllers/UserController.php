<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Joker;
use App\Models\Shuffle;
use App\Models\Skin;
use App\Models\Suit;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    function index(){
        $suits = Suit::all();
        $skins = Skin::all();
        $coins = Coin::all();
        $jokers = Joker::all();
        $shuffles = Shuffle::all();
        return view('users.index',compact('suits','skins','coins','jokers','shuffles'));
    }
    function users_ajax(Request $request){
        return $this->userRepositoryInterface->users_list($request);
    }
    function delete($id){
        return $this->userRepositoryInterface->delete($id);
    }
    function disable($id){
        return $this->userRepositoryInterface->disable($id);
    }
    function activate($id){
        return $this->userRepositoryInterface->activate($id);
    }
    function viewload(Request $request){
        if($request->dataTableName == 'active'){
            return view('users.active');
        }else{
            return view('users.inactive');
        }
    }
}
