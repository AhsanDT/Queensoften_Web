<?php

namespace App\Repositories\Api;

use App\Models\SpinWheel;
use App\Models\UserReward;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SpinWheelApiRepository implements SpinWheelApiInterface
{
    use ResponseTrait;
    protected $model;
    protected $day;
    protected $date;

    public function __construct(SpinWheel $model){
        $this->model = $model;
        $this->date  = date('m-d-Y');
        $this->day =  date('l');
    }
    public function thisMonth($id):JsonResponse
    {
        try {
            $currentMonth = date('F');
            $previousMonths = array_slice(
                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                0,
                date('n') - 1
            );
            SpinWheel::whereIn('month', $previousMonths)->delete();
            $userWheelIds = UserReward::where('user_id', $id)->pluck('wheel_id')->toArray();
            $currentMonthWheels = SpinWheel::where('month', $currentMonth)
                ->whereNotIn('id', $userWheelIds)
                ->get();
            $data = [
                'count' => $currentMonthWheels->count(),
                'wheels' => $currentMonthWheels,
            ];
            return $this->response(true,'',$data,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'Something went wrong please try again later.','',Response::HTTP_UNAUTHORIZED);
        }
    }
}
