<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Category;

class LandingController extends Controller
{
    public function more()
    {
        $latestTemplates = Template::latest('created_at')->paginate(5);
        $sidebarPosts = Template::all();
        $templates = Template::latest('created_at')->paginate(9);
        $categories = Category::all();
        return view('landing.more', compact('categories', 'sidebarPosts', 'latestTemplates', 'templates'));
    }
    public function more_data()
    {
        $latestTemplates = Template::latest('created_at')->paginate(5);
        $sidebarPosts = Template::all();
        $templates = Template::latest('created_at')->paginate(9);
        $categories = Category::all();
        $more = Template::paginate(9);
        
        return view('landing.more_pagination', compact('categories', 'sidebarPosts', 'latestTemplates', 'templates', 'more'))->render();
    }

    #CATEGORY CONTROLLER FILTER
    public function category($id)
    {
        $latestTemplates = Template::latest('created_at')->paginate(5);
        $sidebarPosts = Template::all();
        $more = Template::paginate(9);

        // Filter templates by the selected category ID
        $templates = Template::where('category_id', $id)->latest('created_at')->paginate(6);

        $categories = Category::all();
        $selectedCategory = Category::find($id); // Retrieve the selected category

        return view('landing.category', compact('more', 'categories', 'sidebarPosts', 'latestTemplates', 'templates', 'selectedCategory'));
    }
}
