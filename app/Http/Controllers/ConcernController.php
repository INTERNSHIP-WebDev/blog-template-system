<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ChMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ConcernController extends Controller
{
    public function show()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        return view('concern.index', compact('notifications', 'allNotif'));
    }

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
            Alert::alert('Success!', 'Your concern is sent successfully.');
            return redirect()->route('concern.index')->with('success', 'Email sent successfully!');
        } else {
            // Handle the case where the recipient email address is empty
            return redirect()->back()->with('error', 'Recipient email address is required.');
        }
    }

    // public function sendEmail(Request $request)
    // { //form validation
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'message' => 'required',
    //     ]);

    //     // store data in db
    //     Concern::create($request->all());
    //     // send mail to Super Admin

    //     Mail::send('mail', array(
    //         'name' => $request->get('name'),
    //         'email' => $request->get('email'),
    //         'user_query' => $request->get('message'),
    //     ), function($message) use ($request) {
    //         $message->from($request->email);
    //         $message->to('javed@allphptricks.com', 'SuperAdmin')->subject($request->get('subject'));
    //     });
    //     // Use the trait method to handle contact form submissions
    //     // $this->sendContactEmail($request->all());

    //     //sending email to the admin side
    //     return back() -> with ('success', 'Your message has been sent.');
    // }

    /** 
     * public function store(Request $request)
*{
 *   $concern = new Concern;

  *  $concern->name = $request->name;
   * $concern->email = $request->email;
    *$concern->message = $request->message;
    *$concern->status = 'unread'; // set status to 'unread' by default

    *$concern->save();

    *return back()->with('success', 'Your message has been sent successfully!');
*}
    */
    

}


