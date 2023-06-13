<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportTicketReplyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $filePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$filePath = null)
    {
        $this->data = $data;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject('Support Ticket');

        if($this->filePath)
            $mail->attach($this->filePath);

        return  $mail->view('mail.support_ticket_reply');
    }
}
