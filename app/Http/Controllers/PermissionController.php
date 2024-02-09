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

    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name.*' => 'required|string|max:255', // Validate each name field in the array
            ]);
    
            $names = $request->input('name'); // Get array of names from the form
    
            // Iterate over each name and create a new Permission instance
            foreach ($names as $name) {
                Permission::create([
                    'name' => $name,
                    'guard_name' => 'web',
                ]);
            }
    
            return redirect()->route('permissions.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    


    public function edit($id)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('chats', 'userNames','permission', 'notifications', 'allNotif'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name.*' => 'required|string|max:255', // Validate each name field in the array
            ]);

            $permission = Permission::findOrFail($id);
            
            // Update each permission name individually
            foreach ($validatedData['name'] as $index => $name) {
                $permission->update([
                    'name' => $name,
                    'guard_name' => 'web', 
                ]);
            }

            return redirect()->route('permissions.index'); 
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
            $permission = Permission::findOrFail($id);
            $permission->delete();
    
            return redirect()->route('permissions.index');
    }
}
