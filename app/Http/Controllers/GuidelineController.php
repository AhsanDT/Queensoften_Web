<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Http\Requests\FaqsRequest;
use App\Http\Requests\TermsAndConditionRequest;
use App\Models\Guideline;
use App\Models\GuidelineLog;
use App\Traits\ResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class GuidelineController extends Controller
{
    use ResponseTrait;
    function index(){
        $guideline = Guideline::find(1);
        $logs      = GuidelineLog::orderby('id','DESC')->limit(5)->get();
        return view('guidelines.index',compact('guideline','logs'));
    }
    function store_terms_and_condition(TermsAndConditionRequest $request){
        try {
            Guideline::updateOrCreate([
                'id' => 1
            ],
                [
                    'terms_and_condition' => $request->terms_and_condition
                ]
            );
            $this->saveLogs('Term & Conditions - Updated!');
            return $this->response(true,'Terms & conditions saved successfully',[], Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    function store_aboutUs(AboutUsRequest $request){
        try {

            Guideline::updateOrCreate([
                'id' => 1
            ],
                [
                    'about_us' => $request->about_us
                ]
            );

            $this->saveLogs('About Us - Updated!');
            return $this->response(true,'About Us saved successfully',[], Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    function store_faqs(FaqsRequest $request){
        try {

            Guideline::updateOrCreate([
                'id' => 1
            ],
                [
                    'faqs' => $request->faqs
                ]
            );
            $this->saveLogs('FAQs - Updated!');
            return $this->response(true,'Faqs saved successfully',[], Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    function saveLogs($message){
        $log = new GuidelineLog();
        $log->message = $message;
        $log->date    = now()->format('m/d/Y');
        $log->save();
    }

    function guidelines(){
        try{
            $guideline = Guideline::find(1);
            return $this->response(true,'',$guideline, Response::HTTP_OK);

        }catch (\Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }

    }

    function privacyPolicy(){
        return view('privacy_policy');
    }

    function fbDataDeletion(){
        return view('fb_data_deletion');
    }

    function about(){
        return view('about');
    }
}
