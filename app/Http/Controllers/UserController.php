<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Concern;
use App\Models\Template;
use App\Models\Notification;
use App\Models\Category;
use App\Models\ChMessage;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $roles = Role::all();

        return view('users.index', [
            'users' => User::latest('id')->paginate(5),
            'notifications' => $notifications,
            'allNotif' => $allNotif,
            'chats' => $chats,
            'userNames' => $userNames,
            'roles' => $roles,
        ]);
    }

    //paginate user
    public function paginateUser(Request $request)
    {
        $categoryName = Category::all();
        $searchString = $request->query('search_string');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $selectedRoles = $request->query('roles'); // Get the selected roles

        // Query builder for filtering by search string if it's provided
        $query = User::query();
        if ($searchString) {
            $query->where(function ($query) use ($searchString) {
                $query->where('name', 'like', '%' . $searchString . '%')
                    ->orWhere('email', 'like', '%' . $searchString . '%');
            });
        }

        // Apply date range filter if start date and end date are provided
        if ($startDate && $endDate) {
            $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        }

        // Apply role filter if selected roles are provided
        if ($selectedRoles) {
            // Join with model_has_roles table to get users with selected roles
            $query->join('model_has_roles', function ($join) use ($selectedRoles) {
                $join->on('users.id', '=', 'model_has_roles.model_id')
                    ->whereIn('model_has_roles.role_id', $selectedRoles)
                    ->where('model_has_roles.model_type', '=', 'App\Models\User');
            });
        }

        // Paginate the results
        $users = $query->latest()->paginate(5);

        // Pass the start date, end date, and selected roles to the view
        $users->appends([
            'search_string' => $searchString,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'roles' => $selectedRoles
        ]);

        // Render the view with paginated users
        return view('users.user_pagination', compact('users'))->render();
    }

    //search user
    public function searchUser(Request $request)
    {
        $users = User::where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search_string . '%')
                ->orWhere('email', 'like', '%' . $request->search_string . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(5);

        if ($users->count() >= 1) {
            return view('users.user_pagination', compact('users'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }

    //filter user
    public function filterUser(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $selectedRoles = $request->roles; // Get the selected roles

        $query = User::query();

        // Apply date range filter if start date and end date are provided
        if ($start_date && $end_date) {
            $query->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date);
        }

        // Apply role filter if selected roles are provided
        if ($selectedRoles) {
            // Join with model_has_roles table to get users with selected roles
            $query->join('model_has_roles', function ($join) use ($selectedRoles) {
                $join->on('users.id', '=', 'model_has_roles.model_id')
                    ->whereIn('model_has_roles.role_id', $selectedRoles)
                    ->where('model_has_roles.model_type', '=', 'App\Models\User');
            });
        }

        // Paginate the results
        $users = $query->latest()->paginate(5);

        // Pass the start date, end date, and selected roles to the view
        $users->appends([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'roles' => $selectedRoles
        ]);

        // Render the view with paginated users
        return view('users.user_pagination', compact('users'))->render();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('users.create', [
            'roles' => Role::pluck('name')->all(),
            'notifications' => $notifications,
            'allNotif' => $allNotif,
            'chats' => $chats,
            'userNames' => $userNames,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        // Store user data
        $user = User::create($input);
        $user->assignRole($request->roles);

        // Store user photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/photos/'), $photoName);
            $user->photo = $photoName;
            $user->save();
        }

        toastr()->success(
            'User added successfully!',
            'Success',
            [
                'progressBar' => true,
                'closeButton' => true,
                'preventDuplicates' => true,
                'timeOut' => 3000,
                'showDuration' => 300
            ]
        );

        return redirect()->route('users.index');
        // ->withSuccess('New user is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        // Get the authenticated user
        // $user = Auth::user();

        $templates = Template::where('user_id', auth()->id())->get();

        // Retrieve the templates published by the user whose profile is being viewed
        $userTemplates = Template::where('user_id', $user->id)->paginate(5);

        // Calculate monthly posting data
        $monthlyPostingsData = $userTemplates->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y-m');
        })->map(function ($item, $key) {
            return $item->count();
        });

        // Retrieve the 4 most viewed templates
        $mostViewedTemplates = Template::orderBy('views', 'desc')->take(4)->get();

        // Loop through each template to count the likes
        foreach ($mostViewedTemplates as $template) {
            $template->likeCount = $template->likes()->count(); // Count the likes for each template
        }

        // Retrieve comments in descending order of creation date
        $comments = Comment::orderBy('created_at', 'desc')->get();

        // Retrieve concerns in descending order of creation date
        $concerns = Concern::orderBy('created_at', 'desc')->get();

        // Count the total number of posts, concerns, comments, and likes
        $totalPosts = Template::count();
        $totalConcerns = Concern::count();
        $totalComments = Comment::count();
        $totalLikes = Like::count();

        // Get the total number of posts created by the authenticated user
        $totalUserPosts = Template::where('user_id', $user->id)->count();

        // Get the total number of comments made by the authenticated user
        $totalUserComments = Comment::whereIn('temp_id', function ($query) use ($user) {
            $query->select('id')->from('templates')->where('user_id', $user->id);
        })->count();

        // Get the total number of comments made by the authenticated user
        $totalUserLikes = Like::whereIn('temp_id', function ($query) use ($user) {
            $query->select('id')->from('templates')->where('user_id', $user->id);
        })->count();

        // Get the total number of views for templates created by the authenticated user
        $totalUserViews = Template::where('user_id', $user->id)->sum('views');

        // Retrieve the latest template creation
        $latestTemplate = Template::latest('created_at')->first();
        $activityTemplate = Template::latest('created_at')->get();

        // Get the total number of views for templates created by each user
        $userViews = Template::select('user_id', DB::raw('SUM(views) as total_views'))
            ->groupBy('user_id')
            ->get();

        // You can also get the total views for the current user separately
        $currentUserViews = $userViews->where('user_id', $user->id)->first()->total_views ?? 0;

        // Get the total number of views for templates created by each user
        $userViews = Template::select('user_id', DB::raw('SUM(views) as total_views'))
            ->groupBy('user_id')
            ->get();

        // Retrieve the 4 most viewed templates for the current user
        $mostViewedTemplates = Template::where('user_id', $user->id)
            ->orderBy('views', 'desc')
            ->take(4)
            ->get();

        // Retrieve all users
        $users = User::all();

        // return view('users.show', [
        //     'user' => $user
        // ]);

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        // Pass the variables to the view
        return view('users.show', compact('chats', 'userNames', 'notifications', 'allNotif', 'users', 'userViews', 'userTemplates', 'monthlyPostingsData', 'currentUserViews', 'activityTemplate', 'latestTemplate', 'templates', 'mostViewedTemplates', 'comments', 'concerns', 'user', 'totalPosts', 'totalUserLikes', 'totalConcerns', 'totalComments', 'totalLikes', 'totalUserPosts', 'totalUserComments', 'totalUserViews'));
    }
    public function show_pagination(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $userId = $request->input('user_id');
            $userTemplates = Template::where('user_id', $userId)->paginate(4);
            return view('users.show_pagination', compact('chats', 'userNames', 'userTemplates', 'userId', 'notifications', 'allNotif'))->render();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Super Admin')) {
            if ($user->id != auth()->user()->id) {
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all(),
            'notifications' => $notifications,
            'allNotif' => $allNotif,
            'chats' => $chats,
            'userNames' => $userNames,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $input = $request->all();

        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        } else {
            $input = $request->except('password');
        }

        $user->update($input);

        $user->syncRoles($request->roles);

        // Delete old photo and upload new photo
        if ($request->hasFile('photo')) {
            $oldPhoto = $user->photo;

            // Delete old photo
            if ($oldPhoto) {
                $oldPhotoPath = public_path('images/photos/') . $oldPhoto;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Upload new photo
            $photo = $request->file('photo');
            $photoName = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/photos/'), $photoName);
            $user->update(['photo' => $photoName]);
        }

        toastr()->success(
            'User info updated successfully!',
            'Success',
            [
                'progressBar' => true,
                'closeButton' => true,
                'preventDuplicates' => true,
                'timeOut' => 3000,
                'showDuration' => 300
            ]
        );

        return redirect()->route('users.index'); //->withSuccess('User is updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id) {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();

        toastr()->success(
            'User deleted successfully!',
            'Success',
            [
                'progressBar' => true,
                'closeButton' => true,
                'preventDuplicates' => true,
                'timeOut' => 3000,
                'showDuration' => 300
            ]
        );

        return redirect()->route('users.index');
        //->withSuccess('User is deleted successfully.');
    }
}
