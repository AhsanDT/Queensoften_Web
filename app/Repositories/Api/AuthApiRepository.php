<?php

namespace App\Repositories\Api;


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
            $user = $this->modal->where("username",$userName)->first();
            if($user){
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
                $user = $this->modal->create(['name'=>$request->username,'username'=>$request->username,'email'=>$request->username.'@gmail.com', 'password'=>Hash::make($request->password)]);
//                dd($user);
                $credentials = $request->only('username', 'password');
                if (auth()->attempt($credentials)) {
                    $user->tokens()->where('name', 'access_token')->delete();
                    $token = $user->createToken('access_token')->plainTextToken;
                    return $this->response(
                        true,
                        'Login Successfully',
                        [
                            'user' => $user,
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
}
