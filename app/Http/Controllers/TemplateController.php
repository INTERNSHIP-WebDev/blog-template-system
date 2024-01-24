<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Title;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\Image;
// use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
// use RealRashid\SweetAlert\Facades\Alert;

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
        $templates = Template::all();
        return view('templates.index', compact('templates'));
    }

    public function create()
    {
        return view('templates.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'header' => 'nullable|string|max:255',
                'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000'
            ]);
    
            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $bannerName = 'banner_' . time() . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('images/banners/'), $bannerName);
                $request->merge(['banner' => $bannerName]);
            }
    
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('images/logos/'), $logoName);
                $request->merge(['logo' => $logoName]);
            }

            $template = Template::create([
                'header' => $request->input('header'),
                'banner' => $request->input('header'),
                'logo' => $request->input('header'),
            ]);

            // Process and store each beneficiary
            if ($request->has('titles')) {
                foreach ($request->input('titles') as $titleData) {
                    // You may also add validation for each beneficiary data
                    Title::create([
                        'temp_id' => $template->id,
                        'text' => $titleData['text'],
                    ]);
                }
            }
    
            // Alert::success('Success!', 'Added member successfully.');
    
            return redirect()->route('templates.index')->with('success', 'Template added successfully!');
        } catch (\Exception $e) {
            // Handle exceptions if needed
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $template = Template::findOrFail($id);
        return view('templates.show', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $template = Template::findOrFail($id);
        return view('templates.edit', compact('template'));
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
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000'
         
           ]);

           $template = Template::findOrFail($id);

           $template->update([
            'header' => $request->input('header'),
            'banner' => $request->input('banner'),
            'logo' => $request->input('logo'),
            ]);

            if ($request->hasFile('banner')) {
                $image = $request->file('banner');
                $imageName = 'banner' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/banners/'), $imageName);
                $request->merge(['banner' => $imageName]);
            }

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = 'logo' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/logos/'), $imageName);
                $request->merge(['logo' => $imageName]);
            }


            // You can redirect to the member's profile or any other page after updating
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
        try {
            $template = Template::findOrFail($id);
            $template->delete();

            return response()->json(['success' => true, 'message' => 'Template deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
