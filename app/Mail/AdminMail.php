<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email;
    protected $name;
    protected $comment;
    public function __construct($email,$name,$comment)
    {
        $this->email = $email;
        $this->name = $name;
        $this->comment = $comment;
    }
    public function build()
    {
        $name= $this->name;
        $email= $this->email;
        $comment= $this->comment;
        return $this->view('mail.admin', compact('name','email','comment'));
    }
}
