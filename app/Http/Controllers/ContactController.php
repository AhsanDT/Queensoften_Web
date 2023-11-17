<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\AdminMail;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(ContactRequest $request){
        Mail::to($request->email)->send(new ContactMail($request->email,$request->name,$request->comment));
        Mail::to('admin@queensoften@gmail.com')->send(new AdminMail($request->email,$request->name,$request->comment));
        $contact = Contact::create([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'comment' => $request->comment,
        ]);
        if ($contact){
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Email sent successfully',
                    'status_code' => 200,
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Something went wrong',
                    'status_code' => 302,
                ]
            );
        }
    }
}
