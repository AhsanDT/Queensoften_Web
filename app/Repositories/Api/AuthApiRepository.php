<?php

namespace App\Repositories\Api;


use App\Models\Subscription;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;

class AuthApiRepository implements AuthApiInterface
{
    use ResponseTrait;
    public function __construct()
    {
        $this->modal = new User();
    }
    public function login($request): JsonResponse
    {
        try {
            $userName = $request->username;
            $user = $this->modal->with('purchases', 'subscription')->where("username", $userName)->first();
            if($user){
                $subscriptionType = $user->subscription->type; // Assuming subscription type is stored in the 'type' column
                $maxDropHand = ($subscriptionType === 'free') ? 1 : 3;
                if ($user->drop_hand < $maxDropHand) {
                    $user->drop_hand = $maxDropHand;
                    $user->save();
                } else {
                    return $this->response(
                        false,
                        'You have used all your available drop_hand for today.',
                        '',
                        Response::HTTP_UNAUTHORIZED
                    );
                }

                $checkTrashUser = $this->modal->where("username",$userName)->onlyTrashed()->first();
                $checkUser = $this->modal->where("username",$userName)->where('account_status', 0)->first();

                if ($checkTrashUser || $checkUser){
                    return $this->response(
                        false,
                        'Your account is deleted or disabled by admin. Please contact with support.',
                        '',
                        Response::HTTP_UNAUTHORIZED);
                }
                else{
                    $credentials = $request->only('username', 'password');
                    if(auth()->attempt($credentials)){
                        $user->tokens()->where('name', 'access_token')->delete();

                        $token = $user->createToken('access_token')->plainTextToken;

                        return $this->response(true, 'Login Successfully',
                            [
                                'user' => $user,
                                'achievement' => null,
                                'token' => $token
                            ]
                            , Response::HTTP_OK);
                    }else{
                        return $this->response(false, 'Invalid Credentials.', [], Response::HTTP_UNAUTHORIZED);
                    }
                }
            }else{
                $subscription = Subscription::where('price',0)->first();
                $user = $this->modal->create(['name'=>$request->username,
                    'username'=>$request->username,
                    'email'=>$request->username.'@gmail.com',
                    'subscription_id'=>$subscription->id,
                    'password'=>Hash::make($request->password),
                    'picture'=>'https://images.pexels.com/photos/989941/pexels-photo-989941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2']);
//                dd($user);
                $userNew = $this->modal->with('purchases', 'subscription')->where("username", $user->username)->first();
                $credentials = $request->only('username', 'password');

                if (auth()->attempt($credentials)) {
                    $userNew->tokens()->where('name', 'access_token')->delete();
                    $token = $userNew->createToken('access_token')->plainTextToken;
                    return $this->response(
                        true,
                        'Login Successfully',
                        [
                            'user' => $userNew,
                            'achievement' => null,
                            'token' => $token
                        ],
                        Response::HTTP_OK
                    );
                } else {
                    return $this->response(false, 'Invalid Credentials.', [], Response::HTTP_UNAUTHORIZED);
                }
            }
        } catch (Exception $exception) {
            return $this->response(false, $exception->getMessage(), [], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function logout($request): JsonResponse
    {
        $user = $this->modal->find($request->id);
        if ($user) {
            $user->tokens()->delete();
            $sessionGuard = Auth::guard('web');
            $sessionGuard->logoutOtherDevices($user->password);
            $sessionGuard->logout();
            return $this->response(true, 'Logged out successfully', [], Response::HTTP_OK);
        }
        return $this->response(false, 'User not found', [], Response::HTTP_NOT_FOUND);
    }
}
