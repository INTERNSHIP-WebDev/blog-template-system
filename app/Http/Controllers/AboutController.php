<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        // Your code for displaying the about page goes here
        return view('about.about');
    }
}
