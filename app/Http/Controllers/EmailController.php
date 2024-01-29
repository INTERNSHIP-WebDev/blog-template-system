<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;

class EmailController extends Controller
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
        $concerns = Concern::all();
        return view('emails.index', compact('concerns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch concerns for use in the create view
        $concerns = Concern::all(); 
        return view('emails.create', compact('concerns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic to store the email
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logic to show a specific email
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Logic to show the edit form for a specific email
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Logic to update the email
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Logic to delete the email
    }
}
