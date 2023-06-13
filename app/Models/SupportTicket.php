<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject','message','user_id','support_ticket_id','admin','resolved','attachment','reply'
    ];

    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    function getRead($ticketId){
        return $this->where('read',0)->where('reply','!=',1)->where('support_ticket_id',$ticketId)->count();
    }
    function getLastTicket($ticketId){
        return $this->where('support_ticket_id',$ticketId)->orderBy('id','DESC')->first();
    }

    function admins(){
        return $this->hasOne(Admin::class,'id','admin');
    }
}
