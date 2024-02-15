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
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    
        return view('guests.index', compact('user', 'chats', 'userNames', 'templates', 'notifications', 'allNotif'));
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

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('guests.show', compact('user', 'chats', 'userNames', 'template', 'comments', 'totalTempLikes', 'notifications', 'allNotif'));
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
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        //
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
    
        return view('guests.profile', compact('user', 'chats', 'userNames', 'templates', 'notifications', 'allNotif'));
    }
}
