<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Concern;
use App\Models\Comment;

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
        $totalPosts = Template::count();
        $totalConcerns = Concern::count();
        $totalComments = Comment::count();
        return view('home', compact('totalPosts', 'totalConcerns', 'totalComments'));
    }
}
