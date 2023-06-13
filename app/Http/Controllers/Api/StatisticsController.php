<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatsApiRequest;
use App\Models\Statistics;
use App\Repositories\Api\StatsApiRepositoryInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StatisticsController extends Controller
{
    use ResponseTrait;
    protected $statsRepositoryInterface;

    public function __construct(StatsApiRepositoryInterface $statsRepositoryInterface){
        $this->statsRepositoryInterface = $statsRepositoryInterface ;
    }

    function create(StatsApiRequest $request,$userId):JsonResponse
    {
        return $this->statsRepositoryInterface->create($request,$userId);
    }

    function list($userId,$gameType):JsonResponse
    {
        return $this->statsRepositoryInterface->list($userId,$gameType);
    }
    function test(){
        return $this->statsRepositoryInterface->test();
    }
}
