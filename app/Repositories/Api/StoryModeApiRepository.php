<?php

namespace App\Repositories\Api;

use App\Models\StoryMode;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoryModeApiRepository implements StoryModeApiInterface
{
    use ResponseTrait;
    protected $model;
    protected $day;
    protected $date;

    public function __construct(StoryMode $model){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->day =  date('l');
    }
    public function list(): JsonResponse
    {
        try {
            $stories = StoryMode::where('end_date', '>=', now())->get();
            $data = [
                'count' => $stories->count(),
                'stories' => $stories
            ];

            return $this->response(true,'',$data,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'Something went wrong please try again later.','',Response::HTTP_UNAUTHORIZED);
        }
    }
}
