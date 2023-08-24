<?php

namespace App\Repositories\Api;

use Illuminate\Http\JsonResponse;

interface EstoreApiInterface
{
    public function list():JsonResponse;
    public function deckAttachments($id):JsonResponse;
}
