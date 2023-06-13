<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\ChallengeApiRepository;
use App\Repositories\Api\ChallengeApiRepositoryInterface;
use Illuminate\Http\Request;

class ChallengeApiController extends Controller
{
    protected $challengeApiRepository;

    public function __construct(ChallengeApiRepositoryInterface $challengeApiRepository){
        $this->challengeApiRepository = $challengeApiRepository ;
    }
    function list(){
        return $this->challengeApiRepository->list();
    }
    function get($userId){
        return $this->challengeApiRepository->get($userId);
    }
}
