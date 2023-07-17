<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\TutorialApiInterface;
use Illuminate\Http\Request;

class TutorialApiController extends Controller
{
    protected $tutorialApiRepository;
    public function __construct(TutorialApiInterface $tutorialApiRepository){
        $this->tutorialApiRepository = $tutorialApiRepository;
    }
    public function list(){
        return $this->tutorialApiRepository->list();
    }
}
