<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;

interface UserRepositoryInterface
{
    public function users_list($request);
    public function delete($id):JsonResponse;
    public function disable($id):JsonResponse;
    public function activate($id):JsonResponse;
}
