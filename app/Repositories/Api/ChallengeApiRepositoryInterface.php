<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface ChallengeApiRepositoryInterface
{
    public function list():JsonResponse;
    public function get($userId):JsonResponse;
}
