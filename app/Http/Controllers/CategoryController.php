<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\Image;
use App\Models\Template;
use App\Models\User;
use App\Models\ChMessage;
use App\Models\Category;
use App\Models\Notification;
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
        $this->middleware('permission:create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('permission:create-category', ['only' => ['create','store']]);
        $this->middleware('permission:edit-category', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }

    public function index()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $categories = Category::latest('created_at')->paginate(5);
        
        return view('categories.index', compact('chats', 'userNames','categories', 'notifications', 'allNotif'));
    }

    public function fetch_data_category(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $categories = Category::latest('created_at')->paginate(5);
            return view('categories.pagination_category', compact('chats', 'userNames','categories', 'notifications', 'allNotif'))->render();
        }
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('categories.create', compact('chats', 'userNames','notifications', 'allNotif'));
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

            Alert::alert('Success!', 'Category added successfully.', 'success');

            // Redirect to the category index page or any other page after creation
            return redirect()->route('categories.index'); //->with('success', 'Category added successfully!');
        } catch (\Exception $e) {
            // Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $category = Category::findOrFail($id);
        return view('categories.show', compact('chats', 'userNames','category', 'notifications', 'allNotif'));
    }   

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $category = Category::findOrFail($id);
        return view('categories.edit', compact('chats', 'userNames','category', 'notifications', 'allNotif'));
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

            Alert::success('Success!', 'Category updated successfully.',);

            // Redirect to the category index page or any other page after update
            return redirect()->route('categories.index'); //->with('success', 'Category updated successfully!');
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

            Alert::success('Got it', 'Category deleted successfully');

            //return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return
            Alert::error('Error!', 'Category deleted unsuccessfully.');
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

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('category', compact('chats', 'userNames','notifications', 'allNotif', 'categories', 'heroTemplates', 'descriptions', 'subtitles', 'titles', 'fTemplate', 'latestTemplate', 'templates', 'users'));
    }
}
