<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view_blog($id) {
        $target_blog = Template::find($id);

        $banner_dir = '/images/banners/';

        $banner = $target_blog->banner;
        $header = $target_blog->header;
        

        return view('blog.sample.sample', ['blog' => $target_blog]);
    }
}