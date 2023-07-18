<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface TutorialApiInterface
{
    public function list():JsonResponse;
}
