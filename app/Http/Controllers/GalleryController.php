<?php

namespace App\Http\Controllers;

use App\Models\images; // Import your model
use Illuminate\Http\Request;
use App\Models\Notification;

class GalleryController extends Controller
{
    public function showGallery()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        
        // Paginate banner images
        $bannerTemplates = images::whereNotNull('banner')->paginate(10);

        // Paginate logo images
        $logoTemplates = images::whereNotNull('logo')->paginate(10);

        return view('gallery.blade.php', compact('bannerTemplates', 'logoTemplates','notifications', 'allNotif'));
    }
}
