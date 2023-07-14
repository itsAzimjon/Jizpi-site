<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Welcome;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class WelcomeController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        $welcomes = Welcome::all();
        $categories = Category::all();

        return view('welcome', compact('posts', 'welcomes', 'categories'));
    }

   
    public function store(Request $request)
    {
        $path = $request->file('image')->store('welcome-image');
        
        Welcome::create([
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description,
            'video_link' => $request->video_link ?? 'https://youtu.be/wOmdOMVaVG4'
        ]);

        return redirect('/');
    }

    public function destroy(Welcome $welcome)
    {
        Storage::delete($welcome->image);

        $welcome->delete();

        return redirect()->route('home');
    }
}
