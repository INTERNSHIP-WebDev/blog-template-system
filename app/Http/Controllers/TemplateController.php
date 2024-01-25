<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Title;
use App\Models\Subtitle;
use App\Models\Description;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use DB;
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
    // public function index()
    // {
    //     // Assuming you want to get templates for the currently authenticated user
    //     $templates = auth()->user()->templates;
    //     return view('templates.index', compact('templates'));
    // }

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
                'subtitles.*.text' => 'required|string|max:255',
                'descriptions.*.text' => 'required|string|max:255',
                // 'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:25000',
            ]);

            // Assuming the authenticated user is creating the template
            $user_id = auth()->id();

            // $bannerName = null;
            // $logoName = null;
    
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
                'user_id' => $user_id,
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

            // Process and store each subtitle
            if ($request->has('subtitles')) {
                foreach ($request->input('subtitles') as $subtitleData) {
                    // You may also add validation for each subtitle data
                    Subtitle::create([
                        'temp_id' => $template->id,
                        'text' => $subtitleData['text'],
                    ]);
                }
            }

            // Process and store each description
            if ($request->has('descriptions')) {
                foreach ($request->input('descriptions') as $descriptionData) {
                    // You may also add validation for each description data
                    Description::create([
                        'temp_id' => $template->id,
                        'text' => $descriptionData['text'],
                    ]);
                }
            }

            // Process and store each image
            // if ($request->hasFile('images')) {
            //     foreach ($request->file('images') as $imageFile) {
            //         $imageName = 'image_' . time() . '.' . $imageFile->getClientOriginalExtension();
            //         $imageFile->move(public_path('images/blog_images/'), $imageName);
            //         Image::create([
            //             'temp_id' => $template->id,
            //             'file' => $imageName,
            //         ]);
            //     }
            // }

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
        try {
            $template = Template::findOrFail($id);
            return view('templates.show', compact('template'));
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
            $titles = Title::where('temp_id', $template->id)->get();
            $subtitles = Subtitle::where('temp_id', $template->id)->get();
            $descriptions = Description::where('temp_id', $template->id)->get();
            $images = Image::where('temp_id', $template->id)->get();
            
            return view('templates.edit', compact('template', 'titles', 'subtitles', 'descriptions', 'images'));
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
                'titles.*.text' => 'required|string|max:255',
                'titles.*.id' => 'nullable|exists:titles,id',
                'subtitles.*.text' => 'required|string|max:255', 
                'subtitles.*.id' => 'nullable|exists:subtitles,id',
                'descriptions.*.text' => 'required|string|max:255', 
                'descriptions.*.id' => 'nullable|exists:descriptions,id',
                // 'images.*.text' => 'required|string|max:255', 
                // 'images.*.file' => 'required|image|mimes:jpeg,png,jpg,gif|max:25000', 
            ]);

            $template = Template::findOrFail($id);

            // Assuming the authenticated user is updating the template
            $user_id = auth()->id();

            $oldBanner = $template->banner;
            $oldLogo = $template->logo;

            $template->update([
                'user_id' => $user_id, // Update the user_id field
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

            // Delete titles that are not present in the form
            $titlesToDelete = collect($template->titles->pluck('id'))->diff(
                collect($request->input('titles'))->pluck('id')
            );

            Title::whereIn('id', $titlesToDelete)->delete();

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

            // Delete subtitles that are not present in the form
            $subtitlesToDelete = collect($template->subtitles->pluck('id'))->diff(
                collect($request->input('subtitles'))->pluck('id')
            );

            Subtitle::whereIn('id', $subtitlesToDelete)->delete();

             // Process and update each subtitle
            if ($request->has('subtitles')) {
                foreach ($request->input('subtitles') as $subtitleData) {
                    // Check if the title has an 'id' - update existing title
                    if (isset($subtitleData['id'])) {
                        Subtitle::findOrFail($subtitleData['id'])->update([
                            'text' => $subtitleData['text'],
                        ]);
                    } else {
                        // Create a new subtitle
                        Subtitle::create([
                            'temp_id' => $template->id,
                            'text' => $subtitleData['text'],
                        ]);
                    }
                }
            }

            // Delete descriptions that are not present in the form
            $descriptionsToDelete = collect($template->descriptions->pluck('id'))->diff(
                collect($request->input('descriptions'))->pluck('id')
            );

            Description::whereIn('id', $descriptionsToDelete)->delete();

             // Process and update each description
            if ($request->has('descriptions')) {
                foreach ($request->input('descriptions') as $descriptionData) {
                    // Check if the title has an 'id' - update existing title
                    if (isset($descriptionData['id'])) {
                        Description::findOrFail($descriptionData['id'])->update([
                            'text' => $descriptionData['text'],
                        ]);
                    } else {
                        // Create a new description
                        Description::create([
                            'temp_id' => $template->id,
                            'text' => $descriptionData['text'],
                        ]);
                    }
                }
            }

            // // Delete images that are not present in the form
            // $imagesToDelete = collect($template->images->pluck('id'))->diff(
            //     collect($request->input('images'))->pluck('id')
            // );

            // Image::whereIn('id', $imagesToDelete)->delete();

            //  // Process and update each image
            // if ($request->has('images')) {
            //     foreach ($request->input('images') as $imageData) {
            //         // Check if the title has an 'id' - update existing title
            //         if (isset($imageData['id'])) {
            //             Image::findOrFail($imageData['id'])->update([
            //                 'text' => $imageData['text'],
            //             ]);
            //         } else {
            //             // Create a new image
            //             Image::create([
            //                 'temp_id' => $template->id,
            //                 'file' => $imageData['file'],
            //             ]);
            //         }
            //     }
            // }


            // Delete previous images if new ones are provided
            // if ($request->has('images')) {
            //     $template->images()->delete();
            // }

            // // Process and store each image
            // if ($request->has('images')) {
            //     foreach ($request->file('images') as $imageFile) {
            //         $imageName = 'image_' . time() . '.' . $imageFile->getClientOriginalExtension();
            //         $imageFile->move(public_path('images/blog_images/'), $imageName);
            //         Image::create([
            //             'temp_id' => $template->id,
            //             'file' => $imageName,
            //         ]);
            //     }
            // }

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
}
