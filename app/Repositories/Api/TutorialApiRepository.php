<?php

namespace App\Repositories\Api;

use App\Models\Tutorial;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TutorialApiRepository implements TutorialApiInterface
{
    use ResponseTrait;
    protected $model;
    protected $day;
    protected $date;

    public function __construct(Tutorial $model){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->day =  date('l');
    }
    public function list(): JsonResponse
    {
        try {
            $tutorials =  Tutorial::all();

            $data = [
                'count' => $tutorials->count(),
                'tutorials' => $tutorials
            ];

            return $this->response(true,'',$data,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }
    }
}
