<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConcernController extends Controller
{
    public function show()
    {
        return view('concern.concern');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new concern record in the database
        Concern::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        // Redirect back or show a success message
        return redirect()->back()->with('success', 'Your message has been sent. Thank you!');
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


