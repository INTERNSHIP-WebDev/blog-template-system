<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Concern;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Notification;
use App\Models\ChMessage;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        $templates = Template::where('user_id', auth()->id())->get();

        // Retrieve the 4 most viewed templates
        $mostViewedTemplates = Template::orderBy('views', 'desc')->take(4)->get();

        // Loop through each template to count the likes
        foreach ($mostViewedTemplates as $template) {
            $template->likeCount = $template->likes()->count(); // Count the likes for each template
        }

        // Retrieve comments where the temp_id is published by the authenticated user
        $comments = Comment::whereHas('template', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->orderBy('created_at', 'desc')
        ->get();


        // Retrieve mails from concerns where rcpt_email matches the auth user email
        $concerns = Concern::where('rcpt_email', auth()->user()->email)
        ->orderBy('created_at', 'desc')
        ->get();

        // Count the total number of posts published by the authenticated user
        $totalPosts = Template::where('user_id', auth()->id())->count();
        $totalConcerns = Concern::where('rcpt_email', auth()->user()->email)->count();
        $totalComments = Comment::whereIn('temp_id', function ($query) {
            $query->select('id')
                ->from('templates')
                ->where('user_id', auth()->id());
        })->count();
        
        $totalLikes = Like::count();

        // Get the total number of posts created by the authenticated user
        $totalUserPosts = Template::where('user_id', $user->id)->count();

        // Get the total number of comments made by the authenticated user
        $totalUserComments = Comment::whereIn('temp_id', function ($query) use ($user) {
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

        // Get the total number of comments made by the authenticated user
        $totalUserLikes = Like::whereIn('temp_id', function ($query) use ($user) {
            $query->select('id')->from('templates')->where('user_id', $user->id);
        })->count();

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('seen', false)->get();

        // Pass the variables to the view
        return view('home', compact('chats', 'notifications', 'allNotif', 'totalUserLikes', 'activityTemplate', 'userViews', 'currentUserViews', 'latestTemplate', 'templates', 'mostViewedTemplates', 'comments', 'concerns', 'user', 'totalPosts', 'totalConcerns', 'totalComments', 'totalLikes', 'totalUserPosts', 'totalUserComments', 'totalUserViews'));
    }

    public function all_activity()
    {
        $activityTemplate = Template::latest('created_at')->paginate(5);
        return view('templates.more-activity', compact('activityTemplate'));
    }

    public function fetch_data_more(Request $request)
    {
        if ($request->ajax()) 
        {
            $activityTemplate = Template::latest('created_at')->paginate(5);
            return view('templates.pagination_more', compact('activityTemplate'))->render();
        }
    }
}
