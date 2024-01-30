<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Concern;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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

        // Get the total number of views for templates created by the authenticated user
        $totalUserViews = Template::where('user_id', $user->id)->sum('views');

        // Retrieve the latest template creation
        $latestTemplate = Template::latest('created_at')->first();
        $activityTemplate = Template::latest('created_at')->get();

        // Pass the variables to the view
        return view('home', compact('activityTemplate', 'latestTemplate', 'templates', 'mostViewedTemplates', 'comments', 'concerns', 'user', 'totalPosts', 'totalConcerns', 'totalComments', 'totalLikes', 'totalUserPosts', 'totalUserComments', 'totalUserViews'));
    }

    public function all_activity()
    {
        // Retrieve the latest template creation
        $latestTemplate = Template::latest('created_at')->first();
        $activityTemplate = Template::latest('created_at')->get();
        return view('templates.more-activity', compact('activityTemplate', 'latestTemplate'));
    }

}
