<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\StoryModeApiInterface;
use Illuminate\Http\Request;

class StoryModeApiController extends Controller
{
    protected $storyModeApiRepository;
    public function __construct(StoryModeApiInterface $storyModeApiRepository)
    {
        $this->storyModeApiRepository = $storyModeApiRepository;
    }
    public function list(){
        return $this->storyModeApiRepository->list();
    }
}
