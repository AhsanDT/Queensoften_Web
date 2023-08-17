<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\UserRewardApiInterface;
use Illuminate\Http\Request;

class UserRewardApiController extends Controller
{
    protected $userRewardApiRepository;
    public function __construct(UserRewardApiInterface $userRewardApiRepository){
        $this->userRewardApiRepository = $userRewardApiRepository;
    }
    public function store(Request $request){
        return $this->userRewardApiRepository->store($request);
    }
}
