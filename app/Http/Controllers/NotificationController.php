<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use Illuminate\Http\Request;
use App\Models\ChMessage;
use RealRashid\SweetAlert\Facades\Alert;


class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-notification|edit-notification|delete-notification', ['only' => ['index','show']]);
        $this->middleware('permission:create-notification', ['only' => ['create','store']]);
        $this->middleware('permission:edit-notification', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-notification', ['only' => ['destroy']]);
    }
    public function index()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $anotifications = Notification::latest('created_at')->paginate(5);

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('notifications.index', compact('chats', 'userNames', 'notifications', 'allNotif', 'anotifications'));
    }

    public function fetch_notif_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');


        if ($request->ajax()) {
            $anotifications = Notification::latest('created_at')->paginate(5);
            return view('notifications.notification_pagination', compact('chats', 'userNames', 'anotifications', 'notifications', 'allNotif'))->render();
        }
    }

    public function redirect(Notification $notification)
    {
        switch (true) {
            case $notification->like_id:
                // Redirect to specific template based on like
                $notification->update(['is_read' => true]);
                return redirect()->route('templates.show', ['template' => $notification->like->temp_id]);
                break;
            case $notification->comment_id:
                // Redirect to specific template based on comment
                $notification->update(['is_read' => true]);
                return redirect()->route('templates.show', ['template' => $notification->comment->temp_id]);
                break;
            case $notification->temp_id:
                // Redirect to specific template
                $notification->update(['is_read' => true]);
                return redirect()->route('templates.show', ['template' => $notification->temp_id]);
                break;
            case $notification->mail_id:
                // Redirect to specific email
                $notification->update(['is_read' => true]);
                return redirect()->route('emails.show', ['email' => $notification->mail_id]);
                break;
            case $notification->user_id:
                // Redirect to specific user
                $notification->update(['is_read' => true]);
                return redirect()->route('users.show', ['user' => $notification->user_id]);
                break;
            default:
                // Handle other cases or redirect to a default page
                break;
        }

        $notification->update(['is_read' => true]);
        // Redirect the user to the desired page after updating is_read
        return redirect()->route('notifications.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Notification $notification)
    {
        $notification->read_at = now();
        $notification->is_read = true;
        $notification->save();
        return redirect()->route('notifications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $notification = Notification::findOrFail($id);
            $notification->delete();

            return redirect()->route('notification.index');
    }

}
