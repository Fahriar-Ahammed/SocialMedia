<?php

namespace App\Http\Controllers;

use App\Models\CommentLike;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    public function index()
    {
        return CommentLike::all();
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return CommentLike::create($request->validated());
    }

    public function show(CommentLike $commentLike)
    {
        return $commentLike;
    }

    public function update(Request $request, CommentLike $commentLike)
    {
        $request->validate([

        ]);

        $commentLike->update($request->validated());

        return $commentLike;
    }

    public function destroy(CommentLike $commentLike)
    {
        $commentLike->delete();

        return response()->json();
    }
}
