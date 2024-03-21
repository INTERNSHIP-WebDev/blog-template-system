<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Template;
use App\Models\Notification;
use Illuminate\View\View;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RealRashid\SweetAlert\Facades\Alert;


class TemplateController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-blog|edit-blog|delete-blog', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-blog', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $users = User::all();
        $category = Category::all();

        $templates = Template::latest('created_at')->paginate(5);

        return view('templates.index', compact('category', 'users', 'chats', 'userNames', 'templates', 'notifications', 'allNotif'));
    }


    // paginate template
    public function paginateBlog(Request $request)
    {
        $categoryName = Category::all();
        $searchString = $request->query('search_string');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $selectedUsers = $request->query('selectedAuthors'); // Correct parameter name
        $selectedCategories = $request->query('selectedCategories'); // Retrieve selected category IDs

        // Query builder for filtering by search string if it's provided
        $query = Template::query();
        if ($searchString) {
            $query->where('header', 'like', '%' . $searchString . '%');
        }

        // Apply date range filter if start date and end date are provided
        if ($startDate && $endDate) {
            $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        }

        // Apply filter for selected users
        if (!empty($selectedUsers)) {
            $query->whereIn('user_id', $selectedUsers);
        }

            // Apply filter for selected categories
            if (!empty($selectedCategories)) {
                $query->whereIn('category_id', $selectedCategories);
            }

        // Paginate the results
        $templates = $query->latest()->paginate(5);

        // Pass the start date, end date, and selected users to the view
        $templates->appends([
            'search_string' => $searchString,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'selectedAuthors' => $selectedUsers, // Append selected users to pagination links
            'selectedCategories' => $selectedCategories // Append selected categories to pagination links
        ]);

        // Render the view with paginated templates
        return view('templates.blog_pagination', compact('templates'))->render();
    }


    //search blog
    public function searchBlog(Request $request)
    {
        $templates = Template::where('header', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        if ($templates->count() >= 1) {
            return view('templates.blog_pagination', compact('templates'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }

    // Filter blog
    public function filterBlog(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $selectedAuthors = $request->selectedAuthors; // Retrieve selected user IDs
        $selectedCategories = $request->selectedCategories; // Retrieve selected category IDs

        $query = Template::query();

        // Apply date range filter if start date and end date are provided
        if ($start_date && $end_date) {
            $query->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date);
        }

        // Apply filter for selected users
        if (!empty($selectedAuthors)) {
            $query->whereIn('user_id', $selectedAuthors);
        }

        // Apply filter for selected categories
        if (!empty($selectedCategories)) {
            $query->whereIn('category_id', $selectedCategories);
        }

        // Paginate the results
        $templates = $query->orderBy('created_at', 'desc')->paginate(5);

        // Pass the start date, end date, selected users, and selected categories to the view
        $templates->appends([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'selectedAuthors' => $selectedAuthors, // Append selected authors to pagination links
            'selectedCategories' => $selectedCategories // Append selected categories to pagination links
        ]);

        // Render the view with paginated templates
        return view('templates.blog_pagination', compact('templates'))->render();
    }





    public function create()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();

        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $categories = Category::all();
        return view('templates.create', compact('chats', 'userNames', 'categories', 'notifications', 'allNotif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'header' => 'nullable|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'description' => 'required|string|max:250000',
                'views' => 'nullable|integer',
                'draft' => 'required|in:yes,no',
                'comments.*.name' => 'required|string|max:255',
                'comments.*.message' => 'required|string|max:7000',
            ]);

            // Assuming the authenticated user is creating the template
            $user_id = auth()->id();

            // Upload banner and logo
            $bannerName = null;
            $logoName = null;

            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $bannerName = 'banner_' . time() . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('images/banners/'), $bannerName);
            }

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('images/logos/'), $logoName);
            }

            $draft = $request->input('draft', 'no');

            $template = Template::create([
                'user_id' => $user_id,
                'category_id' => $request->input('category_id'),
                'header' => $request->input('header'),
                'banner' => $bannerName,
                'logo' => $logoName,
                'description' => $request->input('description'),
                'views' => 0,
                'draft' => $draft,
            ]);

            // Process and store each comment
            if ($request->has('comments')) {
                foreach ($request->input('comments') as $commentData) {
                    // You may also add validation for each comment data
                    Comment::create([
                        'temp_id' => $template->id,
                        'name' => $commentData['name'],
                        'message' => $commentData['message'],
                    ]);
                }
            }

            toastr()->success(
                'New template added successfully!',
                'Success',
                [
                    'progressBar' => true,
                    'closeButton' => true,
                    'preventDuplicates' => true,
                    'timeOut' => 3000,
                    'showDuration' => 300
                ]
            );

            return redirect()->route('templates.index'); //->with('success', 'Template added successfully!');
        } catch (\Exception $e) {
            // Handle exceptions if needed
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
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


            return view('templates.show', compact('chats', 'userNames', 'template', 'comments', 'totalTempLikes', 'notifications', 'allNotif'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('templates.index')->with('error', 'Template not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $template = Template::findOrFail($id);
            $categories = Category::all();
            $comments = Comment::where('temp_id', $template->id)->get();

            $notifications = Notification::where('is_read', false)->get();
            $allNotif = Notification::orderBy('created_at', 'desc')->get();
            $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
            $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

            return view('templates.edit', compact('chats', 'userNames', 'template', 'categories', 'comments', 'notifications', 'allNotif'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('templates.index')->with('error', 'Template not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'header' => 'nullable|string|max:255',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'description' => 'nullable|string|max:250000',
                'views' => 'nullable|integer',
                'comments.*.name' => 'required|string|max:255',
                'comments.*.message' => 'required|string|max:7000',
                'comments.*.id' => 'nullable|exists:descriptions,id',
            ]);

            $template = Template::findOrFail($id);

            // Update category_id
            $template->category_id = $request->input('category_id');
            $template->save();

            // Assuming the authenticated user is updating the template
            $user_id = auth()->id();

            $oldBanner = $template->banner;
            $oldLogo = $template->logo;

            $draft = $request->input('draft', 'no');

            $template->update([
                'user_id' => $user_id, // Update the user_id field
                'header' => $request->input('header'),
                'banner' => $request->input('banner', $oldBanner),
                'logo' => $request->input('logo', $oldLogo),
                'description' => $request->input('description'),
                'views' => $request->input('views'),
                'draft' => $draft, // Update the draft status
            ]);

            if ($request->hasFile('banner')) {
                // Delete old banner image
                if ($oldBanner) {
                    $oldBannerPath = public_path('images/banners/') . $oldBanner;
                    if (file_exists($oldBannerPath)) {
                        unlink($oldBannerPath);
                    }
                }

                // Upload new banner image
                $banner = $request->file('banner');
                $bannerName = 'banner_' . time() . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('images/banners/'), $bannerName);
                $template->update(['banner' => $bannerName]);
            }

            if ($request->hasFile('logo')) {
                // Delete old logo image
                if ($oldLogo) {
                    $oldLogoPath = public_path('images/logos/') . $oldLogo;
                    if (file_exists($oldLogoPath)) {
                        unlink($oldLogoPath);
                    }
                }

                // Upload new logo image
                $logo = $request->file('logo');
                $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('images/logos/'), $logoName);
                $template->update(['logo' => $logoName]);
            }

            toastr()->success(
                'Template updated successfully!',
                'Success',
                [
                    'progressBar' => true,
                    'closeButton' => true,
                    'preventDuplicates' => true,
                    'timeOut' => 3000,
                    'showDuration' => 300
                ]
            );

            return redirect()->route('templates.index'); //->with('success', 'Template updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $template = Template::findOrFail($id);
        $template->delete();

        toastr()->success(
            'Template removed successfully!',
            'Success',
            [
                'progressBar' => true,
                'closeButton' => true,
                'preventDuplicates' => true,
                'timeOut' => 3000,
                'showDuration' => 300
            ]
        );

        return redirect()->route('templates.index');
        // ->withSuccess('Template is deleted successfully.');
    }

    public function gallery()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        $templates = Template::latest('created_at')->paginate(9);
        return view('templates.gallery', compact('chats', 'userNames', 'templates', 'notifications', 'allNotif'));
    }

    // GALLERY AJAX
    public function fetch_gallery_banner_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $templates = Template::latest('created_at')->paginate(9);
            return view('templates.gallery_banner_pagination', compact('chats', 'userNames', 'templates', 'notifications', 'allNotif'))->render();
        }
    }

    public function fetch_gallery_logo_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $templates = Template::latest('created_at')->paginate(9);
            return view('templates.gallery_logo_pagination', compact('chats', 'userNames', 'templates', 'notifications', 'allNotif'))->render();
        }
    }

    public function fetch_gallery_logo_list_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $templates = Template::latest('created_at')->paginate(9);
            return view('templates.pagination.gallery_logo_list_pagination', compact('chats', 'userNames', 'templates', 'notifications', 'allNotif'))->render();
        }
    }

    public function fetch_gallery_banner_list_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $templates = Template::latest('created_at')->paginate(9);
            return view('templates.pagination.gallery_banner_list_pagination', compact('chats', 'userNames', 'templates', 'notifications', 'allNotif'))->render();
        }
    }
    // END OF GALLERY AJAX

    public function grid()
    {
        $templates = Template::latest('created_at')->paginate(6);

        // Fetch all categories
        $categories = Category::paginate(6);

        // Fetch all categories with template count
        $categories = Category::withCount('templates')->get();

        // Fetch comments for all templates
        $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('templates.grid', compact('chats', 'userNames', 'templates', 'comments', 'categories', 'notifications', 'allNotif'));
    }
    public function fetch_grid_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $templates = Template::latest('created_at')->paginate(6);
            $categories = Category::paginate(6);
            $categories = Category::withCount('templates')->get();
            $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();
            return view('templates.grid_pagination', compact('chats', 'userNames', 'templates', 'comments', 'categories', 'notifications', 'allNotif'))->render();
        }
    }




    public function list()
    {
        $templates = Template::latest('created_at')->paginate(3);

        // Fetch all categories
        $categories = Category::latest('created_at')->paginate(3);

        // Fetch all categories with template count
        $categories = Category::withCount('templates')->get();

        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        // Fetch comments for all templates
        $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();
        return view('templates.list', compact('chats', 'userNames', 'templates', 'comments', 'categories', 'notifications', 'allNotif'));
    }

    public function fetch_list_data(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $templates = Template::latest('created_at')->paginate(3);
            $categories = Category::latest('created_at')->paginate(3);
            $categories = Category::withCount('templates')->get();
            $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();
            return view('templates.list_pagination', compact('chats', 'userNames', 'templates', 'comments', 'categories', 'notifications', 'allNotif'))->render();
        }
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

    public function like(Request $request, Template $template)
    {
        $user = auth()->user();

        if ($user->hasLiked($template)) {
            $user->unlike($template);
            $liked = false;
        } else {
            $user->like($template);
            $liked = true;
        }

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'totalLikes' => $template->likes()->count(),
        ]);
    }
}
