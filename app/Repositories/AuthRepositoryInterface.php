<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface AuthRepositoryInterface
{
    public function login($request):JsonResponse;
    public function forgot($request):JsonResponse;
    public function reset($request):JsonResponse;
    public function profileUpdate($request,$id):JsonResponse;

}
