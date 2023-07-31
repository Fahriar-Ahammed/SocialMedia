<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function index()
    {
        return PostComment::all();
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return PostComment::create($request->validated());
    }

    public function show(PostComment $postComment)
    {
        return $postComment;
    }

    public function update(Request $request, PostComment $postComment)
    {
        $request->validate([

        ]);

        $postComment->update($request->validated());

        return $postComment;
    }

    public function destroy(PostComment $postComment)
    {
        $postComment->delete();

        return response()->json();
    }
}
