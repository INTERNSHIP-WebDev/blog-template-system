<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function saveToFavorites(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $favorite = new Favorite();
        $favorite->temp_id = $request->temp_id;
        $favorite->user_id = auth()->user()->id;
        $favorite->save();
    
        return response()->json(['message' => 'Template saved to favorites successfully.']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
