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

        $advertisements = Advertisement::latest('created_at')->paginate(5);
        
        return view('advertisements.index', compact('chats', 'userNames','advertisements', 'notifications', 'allNotif'));
    }

    //paginate advertisement
    public function paginateAdvertisement(Request $request)
    {
        $searchString = $request->query('search_string');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
    
        // Query builder for filtering by search string if it's provided
        $query = Advertisement::query();
        if ($searchString) {
            $query->where('file_type', 'like', '%' . $searchString . '%');
        }
    
        // Apply date range filter if start date and end date are provided
        if ($startDate && $endDate) {
            $query->whereDate('created_at', '>=', $startDate)
                  ->whereDate('created_at', '<=', $endDate);
        }
    
        // Paginate the results
        $advertisements = $query->latest()->paginate(5);
    
        // Pass the start date and end date to the view
        $advertisements->appends(['start_date' => $startDate, 'end_date' => $endDate]);
    
        // Render the view with paginated advertisements
        return view('advertisements.advertisement_pagination', compact('advertisements'))->render();
    }  
    
     //search advertisement
     public function searchAdvertisement(Request $request)
     {
         $advertisements = Advertisement::where('file_type', 'like', '%' . $request->search_string . '%')
             ->orderBy('id', 'desc')
             ->paginate(5);
 
         if ($advertisements->count() >= 1) {
             return view('advertisements.advertisement_pagination', compact('advertisements'))->render();
         } else {
             return response()->json([
                 'status' => 'nothing_found',
             ]);
         }
     }

         //filter advertisement
    public function filterAdvertisement(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
    
        $advertisements = Advertisement::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->paginate(5);
    
        return view('advertisements.advertisement_pagination', compact('advertisements'))->render();
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

        // Redirect back with a success message
        toastr()->success('Advertisement added successfully!', 'Success', 
        ['progressBar' => true, 'closeButton' => true, 'preventDuplicates' => true, 
        'timeOut' => 3000, 'showDuration' => 300]);

        return redirect()->route('advertisements.index'); //->with('success', 'Advertisement added successfully!');
    }

    public function destroy($id)
    {
            $ad = Advertisement::findOrFail($id);
            $ad->delete();

            toastr()->success('Advertisement removed successfully!', 'Success', 
            ['progressBar' => true, 'closeButton' => true, 'preventDuplicates' => true, 
            'timeOut' => 3000, 'showDuration' => 300]);
    
            return redirect()->route('advertisements.index');
    }
}