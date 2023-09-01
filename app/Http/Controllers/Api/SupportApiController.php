<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportApiRequest;
use App\Repositories\Api\SupportApiRepositoryInterface;
use Illuminate\Http\Request;

class SupportApiController extends Controller
{
    public $supportApiRepository;
    public function __construct(SupportApiRepositoryInterface $supportApiRepository)
    {
        $this->supportApiRepository = $supportApiRepository;
    }

    function create(SupportApiRequest $request){
        return  $this->supportApiRepository->create($request);
    }

    function myTickets($id){
        return  $this->supportApiRepository->myTickets($id);
    }

    function chat(Request $request,$id){
        return  $this->supportApiRepository->chat($request,$id);
    }
}
