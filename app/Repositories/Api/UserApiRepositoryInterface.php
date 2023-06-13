<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface UserApiRepositoryInterface
{
    public function login($request):JsonResponse;
    public function achievementUpdate($userId):JsonResponse;
    public function achievementUnlock($userId):JsonResponse;
    public function customerDataDelete($request):JsonResponse;
}
