<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\Concern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concerns = Concern::all();
        return view('emails.index', compact('concerns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch concerns for use in the create view
        $concerns = Concern::all(); 
        return view('emails.create', compact('concerns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'rcpt_name' => 'nullable|string|max:255',
            'rcpt_email' => 'nullable|email|max:255',
        ]);

        // Get the authenticated user's name and email
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;

        // Ensure that recipient email address is not empty and is valid
        if (!empty($request->rcpt_email)) {
            // Create a new Concern instance
            $concern = new Concern();
            $concern->send_name = $userName;
            $concern->send_email = $userEmail;
            $concern->subject = $request->subject;
            $concern->message = $request->message;
            $concern->rcpt_name = $request->rcpt_name;
            $concern->rcpt_email = $request->rcpt_email;
            $concern->save();

            // Send the email with dynamic subject and body
            $mailData = [
                'title' => $concern->subject,
                'body' => $concern->message,   
            ];

            Mail::to($concern->rcpt_email)->send(new DemoMail($mailData));
            Mail::to($concern->send_email)->send(new DemoMail($mailData));

            // Redirect to a success page or do whatever is appropriate
            return redirect()->route('emails.index')->with('success', 'Email sent successfully!');
        } else {
            // Handle the case where the recipient email address is empty
            return redirect()->back()->with('error', 'Recipient email address is required.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the email by ID
        $email = Concern::findOrFail($id);
        
        // Return the view to show the email
        return view('emails.show', compact('email'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Logic to delete the email
    }
}
