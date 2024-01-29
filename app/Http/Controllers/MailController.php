<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from blog System',
            'body' => 'How are you? You sent a concern to us',
        ];

        Mail::to('cokoj76157@cubene.com')->send(new DemoMail($mailData));

        dd('Email sent successfully');
    }

    public function inbox()
    {
        $emails = Concern::all();
        return view('emails.index', compact('concerns'));
    }
}
