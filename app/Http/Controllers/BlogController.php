<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view_blog($id) {
        try {

            $banner_dir = 'images/banners/';

            $template = Template::findOrFail($id);
            $formattedtimestamp = $template->created_at->format('F j, Y');

            $latest = Template::take(4)->get();
            
            $template->description = htmlspecialchars_decode($template->description);
            
            // Check if the user has already viewed this blog in the current session
            $hasViewed = Cache::has('viewed_blog_' . $id);
            if (!$hasViewed) {
                // Increment the view count
                DB::table('templates')->where('id', $id)->increment('views');

                // Mark this blog as viewed in the current session
                Cache::put('viewed_blog_' . $id, true);
            }

            // Increment the view count
            $template->increment('views');

            // Fetch comments related to this template
            $comments = Comment::where('temp_id', $id)->get();
            $firstFiveComments = $comments->take(3);
            $remainingComments = $comments->skip(3);
            $comment_count = $comments->count();

            $templates = Template::all();

            return view('blog.sample.sample', compact('template', 'templates', 'firstFiveComments', 'remainingComments', 'latest', 'banner_dir', 'formattedtimestamp', 'comment_count'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('templates.index')->with('error', 'Template not found.');
        }
    }

    public function create_comment(Request $request, $id) {
        $temp_id = $id;
        try {
            $commentName = $request->input('username');
            $commentText = $request->input('comment');

            $comment = new Comment();
            $comment->temp_id = $temp_id;
            $comment->name = $commentName;
            $comment->message = $commentText;
            $comment->save();
            return Redirect::back()->withInput()->with(['status', 'Comment posted successfully']);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('templates.index')->with('error', 'Template not found.');
        }
    }

    public function blog_contacts($id) {
        try {
            $template = Template::findOrFail($id);
            $contacts = true;
            return view('blog.sample.contact', compact('template', 'contacts'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('blog.sample.sample')->with('error', 'Template not found.');
        }
    }

    public function send_specific_concern($id) {
        $template = Template::findOrFail($id);
        return Redirect::back()->withInput()->with('status', 'Email sent successfully');
    }
}