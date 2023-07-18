<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Api\AuthApiInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthApiInterface $authApiRepository;
    public function __construct(AuthApiInterface $authApiRepository){
        $this->authApiRepository = $authApiRepository;
    }
    function login(LoginRequest $request){
        return $this->authApiRepository->login($request);
    }
}
