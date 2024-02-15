<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Notification;
use App\Models\ChMessage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-permission|edit-permission|delete-permission', ['only' => ['index','show']]);
        $this->middleware('permission:create-permission', ['only' => ['create','store']]);
        $this->middleware('permission:edit-permission', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $permissions = Permission::latest()->paginate(5);
        return view('permissions.index', compact('chats', 'userNames', 'permissions', 'notifications', 'allNotif', 'permissions'));
    }

    //paginate permission
    public function pagination(Request $request)
    {
        $searchString = $request->query('search_string');

        // Query builder for filtering by search string if it's provided
        $query = Permission::query();
        if ($searchString) {
            $query->where('name', 'like', '%' . $searchString . '%');
        }

        // Paginate the results
        $permissions = $query->latest()->paginate(5);

        // Render the view with paginated permissions
        return view('permissions.permission_pagination', compact('permissions'))->render();
    }

    //search permission
    public function searchPermission(Request $request)
    {
        $permissions = Permission::where('name', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        if ($permissions->count() >= 1) {
            return view('permissions.permission_pagination', compact('permissions'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }

    public function fetch_permission_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');


        if ($request->ajax()) {
            $permissions = Permission::latest('created_at')->paginate(5);
            return view('permissions.permission_pagination', compact('chats', 'userNames', 'permissions', 'notifications', 'allNotif'))->render();
        }
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            $permissionsQuery = Permission::query();

            if ($query != '') {
                $permissionsQuery->where('name', 'like', '%' . $query . '%');
            }

            $permissions = $permissionsQuery->orderBy('id', 'desc')->paginate(5);

            // Render the paginated results and pagination links
            $view = view('permissions.permission_table_body', compact('permissions'))->render();
            $paginationLinks = $permissions->links()->toHtml();

            return response()->json([
                'table_data'  => $view,
                'total_data'  => $permissions->total(),
                'pagination_links' => $paginationLinks,
            ]);
        }
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

        return view('permissions.edit', compact('chats', 'userNames', 'permission', 'notifications', 'allNotif'));
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
