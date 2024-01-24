<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;

class TitleController extends Controller
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
        $titles = Title::all();
        return view('titles.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = Template::all();

        return view('titles.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the form data
            $request->validate([
                'temp_id' => 'required|exists:templates,id',
                'text' => 'nullable|string|max:255',
            ]);

            // Create a new evaluation
            Title::create($request->all());

            return redirect()->route('titles.index')->with('success', 'Title created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = Title::findOrFail($id);
        return view('titles.show', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = Title::findOrFail($id);
        $templates = Template::all();

        return view('titles.edit', compact('templates', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the form data
            $request->validate([
                'temp_id' => 'required|exists:templates,id',
                'text' => 'nullable|string|max:255',
            ]);

            $title = Title::findOrFail($id);
            $title->update($request->all());

            return redirect()->route('titles.index')->with('success', 'Title updated successfully');
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
            $title = Title::findOrFail($id);
            $title->delete();
    
             return response()->json(['success' => true, 'message' => 'Title deleted successfully.']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
            }
    }
}
