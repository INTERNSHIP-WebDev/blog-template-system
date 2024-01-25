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
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'titles.*.text' => 'required|string|max:255',
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
                'banner' => $request->input('banner'),
                'logo' => $request->input('logo'),
            ]);

           // Process and store each title
            if ($request->has('titles')) {
                foreach ($request->input('titles') as $titleData) {
                    // You may also add validation for each title data
                    Title::create([
                        'temp_id' => $template->id,
                        'text' => $titleData['text'],
                    ]);
                }
            }
    
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
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'titles.*.text' => 'required|string|max:255',
                'titles.*.id' => 'nullable|exists:titles,id', 
            ]);

            $template = Template::findOrFail($id);

            $oldBanner = $template->banner;
            $oldLogo = $template->logo;

            $template->update([
                'header' => $request->input('header'),
                'banner' => $request->input('banner', $oldBanner),
                'logo' => $request->input('logo', $oldLogo),
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
                $bannerName = 'banner' . time() . '.' . $banner->getClientOriginalExtension();
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
                $logoName = 'logo' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('images/logos/'), $logoName);
                $template->update(['logo' => $logoName]);
            }

            // Process and update each title
            if ($request->has('titles')) {
                foreach ($request->input('titles') as $titleData) {
                    // Check if the title has an 'id' - update existing title
                    if (isset($titleData['id'])) {
                        Title::findOrFail($titleData['id'])->update([
                            'text' => $titleData['text'],
                        ]);
                    } else {
                        // Create a new title
                        Title::create([
                            'temp_id' => $template->id,
                            'text' => $titleData['text'],
                        ]);
                    }
                }
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
        try {
            $template = Template::findOrFail($id);
            $template->delete();

            return response()->json(['success' => true, 'message' => 'Template deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
