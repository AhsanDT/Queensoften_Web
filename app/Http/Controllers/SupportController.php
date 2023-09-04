<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use App\Models\SupportTicket;
use App\Models\User;
use App\Services\MailService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use File;

class SupportController extends Controller
{
    use ResponseTrait;

    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    function index()
    {
        $supportTickets = SupportTicket::where('reply','!=',1)->with('user')
            ->orderBy('id','DESC')
            ->get();
//        $supportTickets = SupportTicket::distinct('user_id')->with('user')->get();

        return view('support.index', compact('supportTickets'));
    }

    function get(Request $request)
    {
        try {
            SupportTicket::where('support_ticket_id', $request->support_ticket_id)->update(['read' => 1]);

            $supportTicket = SupportTicket::where('support_ticket_id', $request->support_ticket_id)
                ->with('user')
                ->where('reply', '!=', 1)
                ->first();

            $replies = SupportTicket::where('support_ticket_id', $request->support_ticket_id)
                ->with('admins')
                ->where('reply', 1)
                ->orderBY('id','ASC')
                ->get();
            return view('partials.load_support_tickets', compact('supportTicket', 'replies'));
        } catch (\Exception $exception) {
            return $this->error(false, $exception->getMessage(), '', Response::HTTP_UNAUTHORIZED);
        }
    }

    function sendReply(ReplyRequest $request)
    {
        try {

            if(!$request->email){
                return $this->error(false, "There is no email is attached for this user.Email is required for this action.That's way you can't send the reply. ", '', Response::HTTP_UNAUTHORIZED);
            }

//            die();
            $filePath = null;
            if ($request->hasFile('file')) {
                $destinationPath = public_path('SupportTicketAttachments');
                //give this permission on server sudo chmod -R 775 public
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 755, true);
                }
                $fileName = time() . rand() . '.' . $request->file->extension();
                $request->file->move($destinationPath, $fileName);
                $filePath = URL::to('/') . '/SupportTicketAttachments/' . $fileName;
            }
            $reply = SupportTicket::create([
                'message' => $request->message,
                'admin' => auth('admin')->user()->id,
                'support_ticket_id' => $request->support_ticket_id,
                'attachment' => $filePath,
                'reply' => true,
                'read' => 1,
                'user_id' => $request->user_id,
            ]);

            if (!empty($request->email))
                $this->mailService->sendMail(
                    $request->email,
                    $request->message,
                    $filePath
                );

//            return $this->response(true,'Ticket reply sent successfully',
//                [
//                    'support_ticket_id' => $request->support_ticket_id
//                ],Response::HTTP_OK);
            return view('partials.load_support_reply', compact('reply'));

        } catch (\Exception $exception) {
            return $this->error(false, $exception->getMessage(), '', Response::HTTP_UNAUTHORIZED);
        }
    }


    function message_search(Request $request)
    {
        $supportTickets = SupportTicket::with('user');
        if ($request->message) {
            $supportTickets->Where('message', 'ilike', '%' . $request->message . '%');
        }else{
            $supportTickets = SupportTicket::where('reply','!=',1);

        }
        $supportTickets = $supportTickets->orderBy('id', 'DESC')->get();
        return view('partials.load_support_ticket_messages_list', compact('supportTickets'));
    }

    function load_single_message_list(Request $request)
    {
        $supportTicket = SupportTicket::where('reply', '!=', 1)
            ->where('support_ticket_id', $request->support_ticket_id)
            ->with('user')
            ->orderBy('id', 'DESC')
            ->first();
        if ($supportTicket && $supportTicket->user) {
            $picture = $supportTicket->user->picture ?? '';
        } else {
            $picture = '';
        }
        return view('partials.load_single_message_list', compact('supportTicket', 'picture'));
    }


    function update_status(Request $request)
    {
        try {
            SupportTicket::where('support_ticket_id', $request->support_ticket_id)->update(['read' => $request->status,'resolved' => $request->status,'status'=> $request->status]);
            return $this->response(true, "Status changed successfully", '', Response::HTTP_OK);

        } catch (\Exception $exception) {
            return $this->error(false, $exception->getMessage(), '', Response::HTTP_UNAUTHORIZED);
        }
    }
}
