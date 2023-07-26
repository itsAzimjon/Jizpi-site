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

        $enTranslations = file_get_contents(resource_path('lang/en.json'));
        $enTranslationsArray = json_decode($enTranslations, true);
        $enTranslationsArray[$request->title] = $request->title_en;
        $enTranslationsArray[$request->description] = $request->description_en;
        file_put_contents(resource_path('lang/en.json'), json_encode($enTranslationsArray));
        
        $ruTranslations = file_get_contents(resource_path('lang/ru.json'));
        $ruTranslationsArray = json_decode($ruTranslations, true);
        $ruTranslationsArray[$request->title] = $request->title_ru;
        $ruTranslationsArray[$request->description] = $request->description_ru;
        file_put_contents(resource_path('lang/ru.json'), json_encode($ruTranslationsArray));
        
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

        $enTranslations = file_get_contents(resource_path('lang/en.json'));
        $enTranslationsArray = json_decode($enTranslations, true);
        $enTranslationsArray[$request->title] = $request->title_en;
        $enTranslationsArray[$request->description] = $request->description_en;
        file_put_contents(resource_path('lang/en.json'), json_encode($enTranslationsArray));
        
        $ruTranslations = file_get_contents(resource_path('lang/ru.json'));
        $ruTranslationsArray = json_decode($ruTranslations, true);
        $ruTranslationsArray[$request->title] = $request->title_ru;
        $ruTranslationsArray[$request->description] = $request->description_ru;
        file_put_contents(resource_path('lang/ru.json'), json_encode($ruTranslationsArray));

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->image);

        $post->delete();

        return redirect()->route('home');
    }
}
