<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\ChMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function showNotifications()
    {
        $notifications = Notification::latest('created_at')->where('is_read', false)->get();
        $allNotif = Notification::latest('created_at', 'desc')->get();
    
        return view('layouts.header', compact('notifications', 'allNotif'));
    }
    

    public function showUserProfile()
    {
        $user = auth()->user();
        return view('layouts.header', compact('user'));
    }

    public function showChats()
    {
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('layouts.header', compact('chats', 'userNames'));
    }

    public function chatify()
    {
        return view('chatify');
    }
}