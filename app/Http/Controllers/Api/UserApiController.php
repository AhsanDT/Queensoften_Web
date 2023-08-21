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
    public function getUser($id){
        return $this->userApiRepository->getUser($id);
    }
    public function differ($id){
        return $this->userApiRepository->differ($id);
    }
    public function updatePassword(Request $request){
        return $this->userApiRepository->updatePassword($request);
    }
    public function updateGamerTag(Request $request){
        return $this->userApiRepository->updateGamerTag($request);
    }

}
