<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Notification;
use App\Models\ChMessage;
use App\Models\User;

class PermissionController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $permissions = Permission::paginate(5);

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('permissions.index', compact('chats', 'userNames', 'notifications', 'allNotif', 'permissions'));
    }

    public function create()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $permissions = Permission::paginate(5);

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');


        return view('permissions.create', compact('chats', 'userNames', 'notifications', 'allNotif', 'permissions'));
    }

    public function fetch_permission_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');


        if ($request->ajax()) {
            $permissions = Permission::paginate(5);
            return view('permissions.permission_pagination', compact('chats', 'userNames', 'permissions', 'notifications', 'allNotif'))->render();
        }
    }
}
