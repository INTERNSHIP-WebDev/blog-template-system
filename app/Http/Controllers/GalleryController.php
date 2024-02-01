<?php

namespace App\Http\Controllers;

use App\Models\images; // Import your model
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function showGallery()
    {
        // Paginate banner images
        $bannerTemplates = images::whereNotNull('banner')->paginate(10);

        // Paginate logo images
        $logoTemplates = images::whereNotNull('logo')->paginate(10);

        return view('gallery.blade.php', compact('bannerTemplates', 'logoTemplates'));
    }
}
