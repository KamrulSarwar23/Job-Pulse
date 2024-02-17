<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactPage()
    {
        return view('frontend.pages.contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000'],
        ]);
        
        Mail::to('kh4035209@gmail.com')->send(new Contact($request->name, $request->subject, $request->message, $request->email));
        toastr('Message Send Successfully');
        return redirect()->back();
    }

}
