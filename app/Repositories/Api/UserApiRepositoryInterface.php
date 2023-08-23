<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface UserApiRepositoryInterface
{
    public function login($request):JsonResponse;
    public function achievementUpdate($userId):JsonResponse;
    public function achievementUnlock($userId):JsonResponse;
    public function customerDataDelete($request):JsonResponse;
    public function getUser($id):JsonResponse;
    public function differ($id):JsonResponse;
    public function updatePassword($request):JsonResponse;
    public function updateGamerTag($request):JsonResponse;
    public function updateProfileImage($request):JsonResponse;
}
