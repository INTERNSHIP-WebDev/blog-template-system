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

    public function inbox()
    {
        $concerns = Concern::all();
        $total_concerns = $concerns->count();

        $InboxCount = Concern::where('rcpt_email', auth()->user()->email)->count();
        $SentMailCount = Concern::where('send_email', auth()->user()->email)->count();
        $DraftCount = Concern::where('status', 2)->where('send_email', auth()->user()->email)->count();
        $TrashCount = Concern::where('status', 3)->where('send_email', auth()->user()->email)->count();

        return view('emails.inbox', compact('concerns', 'total_concerns', 'InboxCount', 'SentMailCount', 'DraftCount', 'TrashCount'));
    }


    public function sent()
    {
        $concerns = Concern::latest('created_at')->paginate(7);
        $total_concerns = $concerns->count();

        $InboxCount = Concern::where('rcpt_email', auth()->user()->email)->count();
        $SentMailCount = Concern::where('send_email', auth()->user()->email)->count();
        $DraftCount = Concern::where('status', 2)->where('send_email', auth()->user()->email)->count();
        $TrashCount = Concern::where('status', 3)->where('send_email', auth()->user()->email)->count();

        return view('emails.sent-mail', compact('concerns', 'total_concerns', 'InboxCount', 'SentMailCount', 'DraftCount', 'TrashCount'));
    }

    public function fetch_sent_data(Request $request)
    {
        if ($request->ajax()) {
            $concerns = Concern::latest('created_at')->paginate(7);
            $total_concerns = $concerns->count();

            $InboxCount = Concern::where('rcpt_email', auth()->user()->email)->count();
            $SentMailCount = Concern::where('send_email', auth()->user()->email)->count();
            $DraftCount = Concern::where('status', 2)->where('send_email', auth()->user()->email)->count();
            $TrashCount = Concern::where('status', 3)->where('send_email', auth()->user()->email)->count();
            return view('emails.pagination_sent_mail', compact('concerns', 'total_concerns', 'InboxCount', 'SentMailCount', 'DraftCount', 'TrashCount'))->render();
        }
    }


    public function draft()
    {
        $concerns = Concern::all();
        $total_concerns = $concerns->count();

        $InboxCount = Concern::where('rcpt_email', auth()->user()->email)->count();
        $SentMailCount = Concern::where('send_email', auth()->user()->email)->count();
        $DraftCount = Concern::where('status', 2)->where('send_email', auth()->user()->email)->count();
        $TrashCount = Concern::where('status', 3)->where('send_email', auth()->user()->email)->count();

        $drafts = Concern::where('status', 2)->where('send_email', Auth::user()->email)->get();
        return view('emails.draft', compact('drafts', 'concerns', 'total_concerns', 'InboxCount', 'SentMailCount', 'DraftCount', 'TrashCount'));
    }

    public function trash()
    {
        $concerns = Concern::all();
        $total_concerns = $concerns->count();

        $InboxCount = Concern::where('rcpt_email', auth()->user()->email)->count();
        $SentMailCount = Concern::where('send_email', auth()->user()->email)->count();
        $DraftCount = Concern::where('status', 2)->where('send_email', auth()->user()->email)->count();
        $TrashCount = Concern::where('status', 3)->where('send_email', auth()->user()->email)->count();

        $concerns = Concern::all();
        return view('emails.trash', compact('concerns', 'total_concerns', 'InboxCount', 'SentMailCount', 'DraftCount', 'TrashCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Fetch concerns for use in the create view
        $concerns = Concern::all();

        $InboxCount = Concern::where('rcpt_email', auth()->user()->email)->count();
        $SentMailCount = Concern::where('send_email', auth()->user()->email)->count();
        $DraftCount = Concern::where('status', 2)->where('send_email', auth()->user()->email)->count();
        $TrashCount = Concern::where('status', 3)->where('send_email', auth()->user()->email)->count();

        // Retrieve the latest draft for the authenticated user
        $latestDraft = Concern::where('status', 2)
            ->where('send_email', Auth::user()->email)
            ->latest()
            ->first();

        return view('emails.create', compact('concerns', 'InboxCount', 'SentMailCount', 'latestDraft', 'DraftCount', 'TrashCount'));
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
            // Mail::to($concern->send_email)->send(new DemoMail($mailData));

            // Redirect to a success page or do whatever is appropriate
            return redirect()->route('emails.inbox')->with('success', 'Email sent successfully!');
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

        // Mark the email as read
        $email->update(['status' => 1]);

        $InboxCount = Concern::where('rcpt_email', auth()->user()->email)->count();
        $SentMailCount = Concern::where('send_email', auth()->user()->email)->count();
        $DraftCount = Concern::where('status', 2)->where('send_email', auth()->user()->email)->count();
        $TrashCount = Concern::where('status', 3)->where('send_email', auth()->user()->email)->count();

        // Return the view to show the email
        return view('emails.show', compact('email', 'InboxCount', 'SentMailCount', 'DraftCount', 'TrashCount'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyInbox(Request $request, $id)
    {
        $selectedIds = $request->input('ids', []);

        if (!empty($selectedIds)) {
            Concern::whereIn('id', $selectedIds)->delete();

            return response()->json(['message' => 'Selected emails deleted successfully']);
        } else {
            return response()->json(['error' => 'No emails selected for deletion'], 400);
        }
    }

    /**
     * Mark selected emails as status.
     */
    public function markAsRead(Request $request)
    {
        $selectedIds = $request->input('ids', []);

        if (!empty($selectedIds)) {
            Concern::whereIn('id', $selectedIds)->update(['status' => 1]);

            return response()->json(['message' => 'Selected emails marked as read successfully']);
        } else {
            return response()->json(['error' => 'No emails selected'], 400);
        }
    }

    /**
     * Mark selected emails as unread.
     */
    public function markAsUnread(Request $request)
    {
        $selectedIds = $request->input('ids', []);

        if (!empty($selectedIds)) {
            Concern::whereIn('id', $selectedIds)->update(['status' => 0]);

            return response()->json(['message' => 'Selected emails marked as unread successfully']);
        } else {
            return response()->json(['error' => 'No emails selected'], 400);
        }
    }

    /**
     * Store a newly created draft in storage.
     */
    public function storeDraft(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'rcpt_name' => 'nullable|string|max:255',
            'rcpt_email' => 'nullable|email|max:255',
        ]);

        // Create or update the draft instance
        $draft = Concern::updateOrCreate(
            [
                'send_email' => Auth::user()->email,
                'status' => 2,
            ],
            [
                'send_name' => Auth::user()->name,
                'subject' => $request->subject,
                'message' => $request->message,
                'rcpt_name' => $request->rcpt_name,
                'rcpt_email' => $request->rcpt_email,
            ]
        );

        return redirect()->route('emails.draft')->with('success', 'Draft saved successfully!');
    }
}
