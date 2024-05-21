<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $keyword = $request->input('keyword');
        $posts = Post::where(function ($query) use ($categoryId, $keyword) {
            if ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%');
            }
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }
        })->with('category')->paginate(6);

        $posts = $posts->map(function ($post) {
            $post->category = $post->category;
            $post->clients = $post->clients;
            return $post;
        });
        return ApiResponse::sendResponse(200, 'Posts retrieved successfully', $posts);
    }

    public function show(Request $request, $postId)
    {
        $post = Post::find($postId);
        if ($post) {

            return ApiResponse::sendResponse(200, 'Post retrieved successfully', $post);
        }
        return ApiResponse::sendResponse(400, 'Post not found');
    }

    public function toggleFavorite(Request $request, $post_id)
    {
        $user = $request->user();
        $toggle = $user->posts()->toggle($post_id);
        return ApiResponse::sendResponse(200, 'Post favorite status updated successfully', $toggle);
    }

    public function favoritePosts(Request $request)
    {
        $user = $request->user();
        $favoritePosts = $user->posts;
        return ApiResponse::sendResponse(200, 'Favorite posts retrieved successfully', $favoritePosts);
    }
}
