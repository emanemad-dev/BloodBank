<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $records = Post::all();
        return view('Dashboard.Post.index', compact('records'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Dashboard.Post.create', compact('categories'));
    }

    public function edit($id)
    {
        $record = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        $clients = Client::pluck('name', 'id');
        return view('Dashboard.Post.edit', compact('record', 'categories', 'clients'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);


        $post = Post::create(array_merge($validatedData, ['client_id' => Auth::user()->id]));
        $postId = $post->id;


        $imagePath = $request->file('image')->storeAs('public/images', 'post_' . $postId . '.' . $request->file('image')->getClientOriginalExtension());


        $post->update(['image' => $imagePath]);
        // return $post->image;



        return redirect()->route('posts.index')->with('success', 'Post created successfully.');

    }




    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'favorite' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'client_id' => 'required|exists:clients,id',
        ]);

        // Handle image upload if needed

        $post = Post::findOrFail($id);
        $post->update($validatedData);
        return redirect('posts')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts')->with('success', 'Post deleted successfully.');
    }
}
