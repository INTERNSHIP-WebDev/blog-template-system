<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Template;
use App\Models\ChMessage;
use App\Models\User;
use App\Models\Notification;
use App\Models\Like;
use App\Models\Comment;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-newsfeed', ['only' => ['index', 'show']]);
        $this->middleware('permission:edit-user', ['only' => ['profile', 'update']]);
        $this->middleware('permission:create-like', ['only' => ['toggleLike']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // Fetch notifications and other data as before
        $tempNotifications = Notification::whereNotNull('temp_id')
            ->whereNull('like_id')
            ->whereNull('comment_id')
            ->whereNull('user_id')
            ->whereNull('mail_id')
            ->where('is_read', false)
            ->latest('created_at')
            ->get();

        $tempNotificationsCount = Notification::whereNotNull('temp_id')
            ->whereNull('like_id')
            ->whereNull('comment_id')
            ->whereNull('user_id')
            ->whereNull('mail_id')
            ->where('is_read', false)
            ->count();

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $templates = Template::with(['user', 'likes', 'comments' => function ($query) {
            $query->latest()->limit(3);
        }])->inRandomOrder()->limit(15)->get();

        return view('guests.index', compact('templates', 'tempNotificationsCount', 'tempNotifications', 'user', 'chats', 'userNames', 'notifications', 'allNotif'));
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
    public function store(StoreGuestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();

        $template = Template::findOrFail($id);
        // Pass the description through htmlspecialchars_decode to decode HTML entities
        $template->description = htmlspecialchars_decode($template->description);

        // Increment the view count
        $template->increment('views');

        // Fetch comments related to this template
        $comments = Comment::where('temp_id', $id)->get();

        // Calculate total likes for the template
        $totalTempLikes = Like::where('temp_id', $id)->count();

        // Fetch notifications related to templates where is_read is false
        $tempNotifications = Notification::whereNotNull('temp_id')
            ->whereNull('like_id')
            ->whereNull('comment_id')
            ->whereNull('user_id')
            ->whereNull('mail_id')
            ->where('is_read', false)
            ->latest('created_at') // Order by created_at in descending order
            ->get();

                    // Count notifications related to templates where is_read is false
        $tempNotificationsCount = Notification::whereNotNull('temp_id')
        ->whereNull('like_id')
        ->whereNull('comment_id')
        ->whereNull('user_id')
        ->whereNull('mail_id')
        ->where('is_read', false)
        ->count();

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('guests.show', compact('tempNotificationsCount', 'tempNotifications', 'user', 'chats', 'userNames', 'template', 'comments', 'totalTempLikes', 'notifications', 'allNotif'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Update name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

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

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //
    }

    public function toggleLike(Request $request, $id)
    {
        $template = Template::findOrFail($id);
        $user = auth()->user();

        if (!$template->isLikedByUser($user)) {
            // User hasn't liked the template, so add a like
            $user->like($template);
            $liked = true;
        } else {
            // User has already liked the template, so remove the like
            $user->unlike($template);
            $liked = false;
        }

        // Calculate total likes for the template
        $totalLikes = $template->likes()->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'totalLikes' => $totalLikes,
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
    
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');
    
        // Fetch 10 random templates with eager loading of user, likes, and comments
        $templates = Template::with(['user', 'likes', 'comments' => function ($query) {
            $query->latest()->limit(3); // Fetch latest 3 comments for each template
        }])->inRandomOrder()->limit(15)->get();

         // Fetch notifications related to templates where is_read is false
         $tempNotifications = Notification::whereNotNull('temp_id')
         ->whereNull('like_id')
         ->whereNull('comment_id')
         ->whereNull('user_id')
         ->whereNull('mail_id')
         ->where('is_read', false)
         ->latest('created_at') // Order by created_at in descending order
         ->get();

        // Count notifications related to templates where is_read is false
        $tempNotificationsCount = Notification::whereNotNull('temp_id')
        ->whereNull('like_id')
        ->whereNull('comment_id')
        ->whereNull('user_id')
        ->whereNull('mail_id')
        ->where('is_read', false)
        ->count();

    
        return view('guests.profile', compact('tempNotificationsCount', 'tempNotifications', 'user', 'chats', 'userNames', 'templates', 'notifications', 'allNotif'));
    }

    public function markNotificationAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);

        return response()->json(['message' => 'Notification marked as read'], 200);
    }

    public function fetchNotifications()
    {
        $tempNotifications = Notification::whereNotNull('temp_id')
            ->whereNull('like_id')
            ->whereNull('comment_id')
            ->whereNull('user_id')
            ->whereNull('mail_id')
            ->where('is_read', false)
            ->latest('created_at')
            ->get();

        return view('guests.notifications', compact('tempNotifications'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for users by name
        $searchUsers = User::whereRaw('LOWER(name) like ?', ["%{$query}%"])->get();

        // Search for templates by header or description
        $searchTemplates = Template::whereRaw('LOWER(header) like ?', ["%{$query}%"])
        ->orWhereRaw('LOWER(description) like ?', ["%{$query}%"])
        ->get();

        // Merge user and template search results
        $searchResults = $searchUsers->merge($searchTemplates);

        $user = Auth::user();

        // Fetch notifications and other data as before
        $tempNotifications = Notification::whereNotNull('temp_id')
            ->whereNull('like_id')
            ->whereNull('comment_id')
            ->whereNull('user_id')
            ->whereNull('mail_id')
            ->where('is_read', false)
            ->latest('created_at')
            ->get();

        $tempNotificationsCount = Notification::whereNotNull('temp_id')
            ->whereNull('like_id')
            ->whereNull('comment_id')
            ->whereNull('user_id')
            ->whereNull('mail_id')
            ->where('is_read', false)
            ->count();

        $templates = Template::with(['user', 'likes', 'comments' => function ($query) {
            $query->latest()->limit(3);
        }])->inRandomOrder()->limit(15)->get();
      

        // Pass the search results to the view
        return view('guests.index', compact('templates', 'searchResults', 'searchTemplates', 'searchUsers', 'tempNotificationsCount', 'tempNotifications' ));
    }

}
