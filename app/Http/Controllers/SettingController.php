<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareAppRequest;
use App\Models\Prize;
use App\Models\ShareApp;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    use ResponseTrait;
    function index(){
        $shareApp = ShareApp::find(1);
        $prizes   = Prize::all();
        return view('setting.index',compact('shareApp','prizes'));
    }
    function store_share_app(ShareAppRequest $request){
        try {
            ShareApp::updateOrCreate([
                'id' => 1,
            ],[
                'ios_link'=> $request->ios_link,
                'android_link' => $request->android_link,
                'prize_id' => $request->prize,
                'quantity' =>  $request->quantity,
            ]);
            return $this->response(true,"Setting has been saved successfully.",[], Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);

        }
    }
}
