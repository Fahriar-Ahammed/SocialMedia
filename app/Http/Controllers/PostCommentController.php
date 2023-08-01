<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function index($id)
    {
        return response()->json(PostComment::where('post_id', $id)
            ->select('id', 'user_id', 'comment')
            ->with('User','Replies')
            ->withCount('Likes')
            ->get(), 200);
    }

    public function create(Request $request)
    {
        $data = new PostComment();
        return $this->extracted($request, $data);
    }

    public function show($id)
    {
        $data = PostComment::find($id);

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data = PostComment::find($request->id);
        return $this->extracted($request, $data);
    }

    public function delete($id)
    {
        $data = PostComment::find($id);
        if ($data){
            $data->delete();
        }
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * @param Request $request
     * @param PostComment|array|null $data
     * @return JsonResponse
     */
    public function extracted(Request $request, PostComment|array|null $data): JsonResponse
    {
        $data->user_id = Auth::id();
        $data->post_id = $request->post_id;
        $data->comment = $request->comment;
        $data->save();

        return response()->json(['status' => 'success'], 200);
    }


    public function findUser($data)
    {
        return response()->json(
            User::where('name','LIKE','%'.$data.'%')
            ->select('name')
            ->get()
            ,200
        );
    }
}
