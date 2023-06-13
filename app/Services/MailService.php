<?php
namespace App\Services;


use App\Mail\SupportTicketReplyMail;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailService{
    use ResponseTrait;
    function sendMail($email,$message,$filePath = null){
        try {
            Mail::to($email)->send(new SupportTicketReplyMail($message,$filePath));
        }catch (\Exception $exception){
            return $this->error(false,$exception->getMessage(),'',Response::HTTP_UNAUTHORIZED);
        }
    }
}
