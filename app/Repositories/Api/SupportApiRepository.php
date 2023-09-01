<?php

namespace App\Repositories\Api;

use App\Models\SupportTicket;
use App\Traits\NotificationTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Response;

class SupportApiRepository implements SupportApiRepositoryInterface
{
    use ResponseTrait;
    use NotificationTrait;
    protected $model;

    public function __construct(SupportTicket $model)
    {
        $this->model = $model;
    }

    function create($request): JsonResponse
    {
        try{
            if($request->ticket !== ''){
                $this->model::create([
                    'subject'=> $request->subject,
                    'message'=> $request->message,
                    'user_id'=> $request->user_id,
                    'support_ticket_id' => $request->ticket
                ]);
                $this->notification_save($request->user_id,3);
            }else{
                $this->model::create([
                    'subject'=> $request->subject,
                    'message'=> $request->message,
                    'user_id'=> $request->user_id,
                    'support_ticket_id' => rand(0,10).Str::random(10).Str::random(10)
                ]);
                $this->notification_save($request->user_id,3);
            }
            return $this->response(true,'Ticket submitted successfully.',[], Response::HTTP_OK);

        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);

        }
    }
    function myTickets($id): JsonResponse
    {
        try{
           $tickets = $this->model::where('user_id',$id)->get();
            return $this->response(true,'Ticket fetched successfully.',$tickets, Response::HTTP_OK);
        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
    function chat($request,$id): JsonResponse
    {
        try{
           $tickets = $this->model::where('user_id',$id)->where('support_ticket_id',$request->ticket)->get();
            return $this->response(true,'chat fetched successfully.',$tickets, Response::HTTP_OK);
        }catch (Exception $exception){
            return $this->response(false,'Something went wrong please try again later.',[], Response::HTTP_UNAUTHORIZED);
        }
    }
}
