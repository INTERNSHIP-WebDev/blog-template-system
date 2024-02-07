<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
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
    // Controller method for storing comments
    public function store(Request $request)
    {
        $request->validate([
            'temp_id' => 'required|exists:templates,id',
            'name' => 'required|string',
            'message' => 'required|string',
        ]);

        // Create a new comment instance
        $comment = new Comment();
        $comment->temp_id = $request->temp_id;
        $comment->name = $request->name;
        $comment->message = $request->message;
        $comment->save();

        Alert::alert('Success!', 'Your comment has been posted successfully');

        return redirect()->back()->with('success', 'Comment submitted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        Alert::alert('Success!', 'Comment is successfully deleted.');

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
