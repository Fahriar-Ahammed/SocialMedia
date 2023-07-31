<?php

namespace App\Http\Controllers;

use App\Models\PostLike;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function index()
    {
        return PostLike::all();
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return PostLike::create($request->validated());
    }

    public function show(PostLike $postLike)
    {
        return $postLike;
    }

    public function update(Request $request, PostLike $postLike)
    {
        $request->validate([

        ]);

        $postLike->update($request->validated());

        return $postLike;
    }

    public function destroy(PostLike $postLike)
    {
        $postLike->delete();

        return response()->json();
    }
}
