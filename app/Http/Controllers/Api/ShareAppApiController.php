<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShareApp;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareAppApiController extends Controller
{
    use ResponseTrait;
    function getLink(Request $request){
        try {

            $link = ShareApp::join('prizes', 'share_apps.prize_id', '=', 'prizes.id', 'inner')
                ->select('share_apps.ios_link','share_apps.android_link','share_apps.quantity','prizes.name as prize')
            ->find(1);


            return $this->response(true,'',$link,Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(true,'','Something went wrong please try again later.',Response::HTTP_UNAUTHORIZED);
        }

    }
}
