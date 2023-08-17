<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\SpinWheelApiInterface;
use Illuminate\Http\Request;

class SpinWheelApiController extends Controller
{
    protected $spinWheelApiRepository;
    public function __construct(SpinWheelApiInterface $spinWheelApiRepository){
        $this->spinWheelApiRepository = $spinWheelApiRepository;
    }
    public function thisMonth($id){
        return $this->spinWheelApiRepository->thisMonth($id);
    }
}
