<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostPhotos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(
            Post::with('user', 'photos', 'likes')
                ->withCount('comments','likes')
                ->latest()->paginate(10)
            ,200);
    }

    public function create(Request $request)
    {
        $data = new Post();
        return $this->extracted($request, $data);
    }

    public function show($id)
    {
        $data = Post::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data = Post::find($request->id);
        return $this->extracted($request, $data);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->Photos()->delete();
            $post->Likes()->delete();
            $post->Comments()->delete();
            $post->delete();
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * @param Request $request
     * @param Post|array|null $data
     * @return JsonResponse
     */
    public function extracted(Request $request, Post|array|null $data): JsonResponse
    {
        $data->user_id = Auth::id();
        if ($request->post) {
            $data->post = $request->post;
        }

        $data->save();
        if ($request->photos) {
            $photosData = json_decode($request->photos, true);
            foreach ($photosData as  $photo) {
                $postPhotos = new PostPhotos();;
                $postPhotos->post_id = $data->id;
                $postPhotos->photo_url = $photo['photo_url'];
                $postPhotos->save();
            }
        }
        return response()->json(['status' => 'success'], 200);
    }

    public function postPhotoDelete(Request $request)
    {
        if ($request->photos) {
            $photosData = json_decode($request->photos, true);
            foreach ($photosData as $key => $data2) {
                $postPhotos = PostPhotos::find($data2['id']);
                if ($postPhotos) {
                    $postPhotos->delete();
                }
            }
        }
        return response()->json(['status' => 'success'], 200);
    }
}
