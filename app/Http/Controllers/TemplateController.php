<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Template;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = Template::latest('created_at')->paginate(5);
        return view('templates.index', compact('templates'));
    }
    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $templates = Template::latest('created_at')->paginate(5);
            return view('templates.pagination_data',compact('templates'))->render();
        }
    }
    
    public function create()
    {
        $categories = Category::all(); 
        return view('templates.create', compact('categories'));
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

            $template = Template::create([
                'user_id' => $user_id,
                'category_id' => $request->input('category_id'),
                'header' => $request->input('header'),
                'banner' => $bannerName,
                'logo' => $logoName,
                'description' => $request->input('description'),
                'views' => 0,
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

            return redirect()->route('templates.index')->with('success', 'Template added successfully!');
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

            return view('templates.show', compact('template', 'comments', 'totalTempLikes'));
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
            
            return view('templates.edit', compact('template', 'categories', 'comments'));
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

            $template->update([
                'user_id' => $user_id, // Update the user_id field
                'header' => $request->input('header'),
                'banner' => $request->input('banner', $oldBanner),
                'logo' => $request->input('logo', $oldLogo),
                'description' => $request->input('description'),
                'views' => $request->input('views'),
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

            return redirect()->route('templates.index')->with('success', 'Template updated successfully!');
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

            return redirect()->route('templates.index')
                ->withSuccess('Template is deleted successfully.');
    }

    public function gallery()
    {
    $templates = Template::paginate(9);
    return view('templates.gallery', compact('templates'));
    }

    // GALLERY AJAX
        public function fetch_gallery_banner_data(Request $request)
        {
            if($request->ajax())
            {
                $templates = Template::paginate(9);
                return view('templates.gallery_banner_pagination',compact('templates'))->render();
            }
        }
        public function fetch_gallery_logo_data(Request $request)
        {
            if($request->ajax())
            {
                $templates = Template::paginate(9);
                return view('templates.gallery_logo_pagination',compact('templates'))->render();
            }
        }
        public function fetch_gallery_logo_list_data(Request $request)
        {
            if($request->ajax())
            {
                $templates = Template::paginate(9);
                return view('templates.pagination.gallery_logo_list_pagination',compact('templates'))->render();
            }
        }
        public function fetch_gallery_banner_list_data(Request $request)
        {
            if($request->ajax())
            {
                $templates = Template::paginate(9);
                return view('templates.pagination.gallery_banner_list_pagination',compact('templates'))->render();
            }
        }
    // END OF GALLERY AJAX

    public function grid()
    {
        $templates = Template::paginate(6);
        
        // Fetch all categories
        $categories = Category::paginate(6);

        // Fetch all categories with template count
        $categories = Category::withCount('templates')->get();

        // Fetch comments for all templates
        $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();
        return view('templates.grid', compact('templates', 'comments', 'categories'));
    }
    public function fetch_grid_data(Request $request)
    {
        if($request->ajax())
        {
            $templates = Template::paginate(6);
            $categories = Category::paginate(6);
            $categories = Category::withCount('templates')->get();
            $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();
            return view('templates.grid_pagination',compact('templates', 'comments', 'categories'))->render();
        }
    }

   
 
   
    public function list()
    {
        $templates = Template::latest('created_at')->paginate(3);

        // Fetch all categories
        $categories = Category::latest('created_at')->paginate(3);

        // Fetch all categories with template count
        $categories = Category::withCount('templates')->get();

        // Fetch comments for all templates
        $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();
        return view('templates.list', compact('templates', 'comments', 'categories'));
    }

    public function fetch_list_data(Request $request)
    {
        if($request->ajax())
        {
            $templates = Template::latest('created_at')->paginate(3);
            $categories = Category::latest('created_at')->paginate(3);
            $categories = Category::withCount('templates')->get();
            $comments = Comment::whereIn('temp_id', $templates->pluck('id'))->get();
            return view('templates.list_pagination',compact('templates', 'comments', 'categories'))->render();
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


}
    