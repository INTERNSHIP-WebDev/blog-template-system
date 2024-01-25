<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.contact');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        //sending email to the admin side
        Mail::to('admin@uwu.com')->send(new \App\Mail\ContactMail($request->all()));

        return redirect('/contact')->with('success', 'Email sent successfully!');
    }
}
