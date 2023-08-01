<?php

namespace App\Http\Controllers;

use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function index($id)
    {
        return response()->json(
            PostLike::where('post_id',$id)
                ->with('user')
                ->latest()->get()
        );
    }

    public function giveLike($id)
    {
        $checking = PostLike::where('post_id',$id)
            ->where('user_id',Auth::id())
            ->first();
        if (!$checking){
            $data = new PostLike();
            $data->user_id = Auth::id();
            $data->post_id = $id;
            $data->save();
        }

        return response()->json(['status' => 'success'], 200);
    }


    public function removeLike($id)
    {
        $checking = PostLike::where('post_id',$id)
            ->where('user_id',Auth::id())
            ->first();
        if ($checking){
            $checking->delete();
        }
        return response()->json(['status' => 'success'], 200);
    }
}
