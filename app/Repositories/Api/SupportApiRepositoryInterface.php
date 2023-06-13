<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface SupportApiRepositoryInterface
{
    public function create($request):JsonResponse;
}
