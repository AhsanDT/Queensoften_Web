<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface SpinWheelApiInterface
{
    public function thisMonth($id):JsonResponse;
}
