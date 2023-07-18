<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface AuthApiInterface
{
    public function login($request):JsonResponse;
}
