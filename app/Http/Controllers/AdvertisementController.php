<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\ChMessage;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;



class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-advertisement|edit-advertisement|delete-advertisement', ['only' => ['index','show']]);
        $this->middleware('permission:create-advertisement', ['only' => ['create','store']]);
        $this->middleware('permission:edit-advertisement', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-advertisement', ['only' => ['destroy']]);
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

        $ads = Advertisement::latest('created_at')->paginate(5);
        
        return view('advertisements.index', compact('chats', 'userNames','ads', 'notifications', 'allNotif'));
    }

    public function fetch_data_advertisement(Request $request)
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        if ($request->ajax()) {
            $ads = Advertisement::latest('created_at')->paginate(5);
            return view('advertisements.pagination_advertisement', compact('chats', 'userNames','ads', 'notifications', 'allNotif'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notifications = Notification::where('is_read', false)->get();
        $allNotif = Notification::orderBy('created_at', 'desc')->get();
        $chats = ChMessage::latest('created_at')->where('to_id', auth()->id())->where('seen', 0)->get();
        $userNames = User::whereIn('id', $chats->pluck('to_id'))->pluck('name');

        return view('advertisements.create', compact('chats', 'userNames','notifications', 'allNotif'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|file|mimes:jpeg,png,mp4,jpg,gif|max:25000', 
        ]);

        // Determine the file type based on the file extension
        $fileType = null;
        $allowedImageExtensions = ['jpeg', 'png', 'jpg'];
        $allowedGIFExtensions = ['gif'];
        $allowedVideoExtensions = ['mp4'];

        $extension = $request->file('name')->getClientOriginalExtension();

        if (in_array($extension, $allowedImageExtensions)) {
            $fileType = 'Image';
        } elseif (in_array($extension, $allowedVideoExtensions)) {
            $fileType = 'Video';
        } elseif (in_array($extension, $allowedGIFExtensions)) {
            $fileType = 'GIF';
        } else {
            return redirect()->back()->with('error', 'Unsupported file type.');
        }

        // Generate a unique filename
        $fileName = 'ad_' . time() . '.' . $extension;

        // Move the uploaded file to the images/ads directory
        $request->file('name')->move(public_path('images/ads/'), $fileName);

        // Create the advertisement record in the database
        Advertisement::create([
            'file_type' => $fileType,
            'name' => $fileName,
        ]);


        Alert::success('Success', 'Ad added successfully');
        // Redirect back with a success message
        return redirect()->route('advertisements.index')->with('success', 'Advertisement added successfully!');
    }

    public function destroy($id)
    {
            $ad = Advertisement::findOrFail($id);
            $ad->delete();
    
            return redirect()->route('advertisements.index');
    }
}
