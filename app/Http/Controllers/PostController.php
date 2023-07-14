<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('layouts.main.index', compact('posts', 'categories'));


    }

    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('post-image');
        
        Post::create([
            'category_id'=> $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('home');
    }

    public function show(Post $post)
    {
        $posts = Post::all();
        return view('posts.show', compact('posts', 'post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post, 'categories' => Category::all()]);
    }

    public function update(Request $request, Post $post)
    {
        if($request->hasFile('image')){
            
            if(isset($post->image)){
                Storage::delete($post->image);
            }
            $path = $request->file('image')->store('post-image');
        }

        $post->update([
            'category_id'=> $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ?? $post->image,
        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->image);

        $post->delete();

        return redirect()->route('home');
    }
}
