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
        $this->middleware('permission:create-category|edit-category|delete-category', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-category', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }

    public function index()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $categories = Category::latest('created_at')->paginate(5);

        return view('categories.index', compact('chats', 'userNames', 'categories', 'notifications', 'allNotif'));
    }

    //paginate category
    public function paginateCategory(Request $request)
    {
        $searchString = $request->query('search_string');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        // Query builder for filtering by search string if it's provided
        $query = Category::query();
        if ($searchString) {
            $query->where('text', 'like', '%' . $searchString . '%');
        }

        // Apply date range filter if start date and end date are provided
        if ($startDate && $endDate) {
            $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        }

        // Paginate the results
        $categories = $query->latest()->paginate(5);

        // Pass the start date and end date to the view
        $categories->appends(['start_date' => $startDate, 'end_date' => $endDate]);

        // Render the view with paginated permissions
        return view('categories.category_pagination', compact('categories'))->render();
    }

    //search category
    public function searchCategory(Request $request)
    {
        $categories = Category::where('text', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        if ($categories->count() >= 1) {
            return view('categories.category_pagination', compact('categories'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }

    //filter category
    public function filterCategory(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $categories = Category::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->paginate(5);

        return view('categories.category_pagination', compact('categories'))->render();
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

        return view('categories.create', compact('chats', 'userNames', 'notifications', 'allNotif'));
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

            // Check if the category already exists
            $existingCategory = Category::where('text', $request->input('text'))->first();
            if ($existingCategory) {
                toastr()->warning('Category already exists!', 'Warning', 
                ['progressBar' => true, 'closeButton' => true, 'timeOut' => 3000]);
                return redirect()->back();
            }

            // Create a new category instance and save to the database
            Category::create([
                'text' => $request->input('text'),
            ]);

            toastr()->success('Category added successfully!', 'Success', 
            ['progressBar' => true, 'closeButton' => true, 'preventDuplicates' => true, 
            'timeOut' => 3000, 'showDuration' => 300]);

            // Redirect to the category index page or any other page after creation
            return redirect()->route('categories.index'); //->with('success', 'Category added successfully!');
        } catch (\Exception $e) {

            toastr()->error('An error has occurred please try again later.');

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
        return view('categories.show', compact('chats', 'userNames', 'category', 'notifications', 'allNotif'));
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
        return view('categories.edit', compact('chats', 'userNames', 'category', 'notifications', 'allNotif'));
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

            toastr()->success('Category updated successfully!', 'Success', 
            ['progressBar' => true, 'closeButton' => true, 'preventDuplicates' => true, 
            'timeOut' => 3000, 'showDuration' => 300]);

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

            toastr()->success('Category deleted successfully!', 'Success', 
            ['progressBar' => true, 'closeButton' => true, 'preventDuplicates' => true, 
            'timeOut' => 3000, 'showDuration' => 300]);

            //return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
            return redirect()->route('categories.index');
            } catch (\Exception $e) {
            return
                toastr()->error('An error has occurred please try again later.');
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

        return view('category', compact('chats', 'userNames', 'notifications', 'allNotif', 'categories', 'heroTemplates', 'descriptions', 'subtitles', 'titles', 'fTemplate', 'latestTemplate', 'templates', 'users'));
    }
}
