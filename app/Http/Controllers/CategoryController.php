<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\Image;
use App\Models\Template;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'text' => 'required|string|max:255',
            ]);

            // Create a new category instance and save to the database
            Category::create([
                'text' => $request->input('text'),
            ]);

            // Alert::success('Success!', 'Added category successfully.');

            // Redirect to the category index page or any other page after creation
            return redirect()->route('categories.index')->with('success', 'Category added successfully!');
        } catch (\Exception $e) {
            // Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'text' => 'required|string|max:255',
                // Add validation rules for other fields based on your Category model
            ]);

            // Find the category by ID and update its information
            $category = Category::findOrFail($id);
            $category->update($validatedData);

            // Alert::success('Success!', 'Updated category successfully.');

            // Redirect to the category index page or any other page after update
            return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            // Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function category_page()
    {
        $titles = Title::all();
        $heroTemplates = Template::latest('created_at')->take(4)->get();
        $latestTemplate = Template::latest()->first();
        
        // Check if $latestTemplate is null
        if ($latestTemplate) {
            $templates = Template::whereNotIn('id', [$latestTemplate->id])->latest('created_at')->paginate(9);
        } else {
            $templates = Template::latest('created_at')->paginate(9);
        }
    
        $fTemplate = Template::latest('created_at')->paginate(4);
        $users = User::all();
        $subtitles = Subtitle::all();
        $descriptions = Description::all();
        $categories = Category::all();
        return view('category', compact('categories', 'heroTemplates', 'descriptions', 'subtitles', 'titles', 'fTemplate', 'latestTemplate', 'templates', 'users'));
    }

}