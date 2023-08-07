<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\User;
use App\Models\UserPurchase;
use Illuminate\Http\Request;

class SubscriptionWinnerController extends Controller
{
    function index(){
        return view('subscription-winner.index');
    }
    public function winner(Request $request){
        $selectedOptions = [
            'suit' => $request->input('suit'),
            'skin' => $request->input('skin'),
            'coins' => $request->input('coins'),
            'joker' => $request->input('joker'),
            'shuffle' => $request->input('shuffle'),
        ];
        $isEmpty = true;

        // Check if any selected option is not empty
        foreach ($selectedOptions as $type => $purchaseId) {
            if ($purchaseId) {
                $isEmpty = false;
                break;
            }
        }

        if ($isEmpty) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'error'=>'No options selected. Please select at least one option.'
                ],
                'status_code' => 400,
            ],400);
        }
        $randomUserId = User::inRandomOrder()->value('id');
        $user = User::find($randomUserId)->get();
        foreach ($selectedOptions as $type => $purchaseId) {
            if ($purchaseId) {
                $userPurchase = new UserPurchase();
                $userPurchase->user_id = $randomUserId;
                $userPurchase->type = $type;
                $userPurchase->purchase_id = $purchaseId;
                $userPurchase->save();
            }
        }
        if($request->input('coins')){
            $selectedCoins = Coin::find($selectedOptions['coins']);
            if ($selectedCoins) {
                $user = User::find($randomUserId);
                $user->coins += $selectedCoins->coins;
                $user->save();
            }
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Winner Selected Successfully',
                'status_code' => 200,
            ]);
    }

}
