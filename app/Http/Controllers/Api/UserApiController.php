<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthApiRequest;
use App\Repositories\Api\UserApiRepositoryInterface;
use Illuminate\Http\Request;


class UserApiController extends Controller
{

    private UserApiRepositoryInterface $userApiRepository;

    public function __construct(UserApiRepositoryInterface $userApiRepository)
    {
        $this->userApiRepository    =   $userApiRepository;
    }
    /**
     * @OA\Post(
     *      path="/api/v1/login",
     *     @OA\Parameter(
     *      name="email",
     *      description="email is required for login with facebook or google",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *      type="string"
     *      )
     *     ),
     *     @OA\Parameter(
     *      name="name",
     *      description="name is required for login with facebook or google",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *      type="string"
     *      )
     *     ),
     *     @OA\Parameter(
     *      name="username",
     *      description="username is required for login with facebook or google",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *      type="string"
     *      )
     *     ),
     *     @OA\Parameter(
     *      name="picture",
     *      description="profile image",
     *      required=false,
     *      in="path",
     *      @OA\Schema(
     *      type="string"
     *      )
     *     ),
     *     @OA\Parameter(
     *      name="driver",
     *      description="driver name e.g : facebook,google,apple",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *      type="string"
     *      )
     *     ),
     *     @OA\Parameter(
     *      name="driver_id",
     *      description="account id of google,facebook,apple",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *      type="string"
     *      )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Login Successfully",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Authentication Error",
     *      ),
     *     @OA\PathItem (
     *     ),
     *
     * )
     */
    function login(AuthApiRequest $request){
        return $this->userApiRepository->login($request);
    }
    function achievementUpdate(Request $request){
        return $this->userApiRepository->achievementUpdate($request->user_id);
    }
    function achievementUnlock(Request $request){
        return $this->userApiRepository->achievementUnlock($request->user_id);
    }
    function customerDataDelete(Request $request){
        return $this->userApiRepository->customerDataDelete($request);
    }

}
