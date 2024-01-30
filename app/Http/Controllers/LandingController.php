<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class LandingController extends Controller
{
    public function more()
    {
        $latestTemplates = Template::latest()->paginate(9); // 3 data per row and 3 columns
        $sidebarPosts = Template::all();
        return view('landing.more', compact('sidebarPosts', 'latestTemplates'));
    }
}
