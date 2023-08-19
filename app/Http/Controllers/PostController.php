<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::paginate(16);
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
               
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:348',
            'mult_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:348'
        ]);
        
        $path = $request->file('image')->store('post-image');
        
        $mults = [];

        if ($request->hasFile('mult_image')) {
            foreach ($request->file('mult_image') as $image) {
                $mult = $image->store('post-mult-image');
                $mults[] = $mult;
            }
        }
        
        Post::create([
            'category_id'=> $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'mult_image' => $mults,
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

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        
        return view('posts.edit', compact('post', 'categories'));
    }
    

    public function update(Request $request, $id)
    {
        
        $post = Post::findOrFail($id);
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:348',
            'mult_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:348'
        ]);
        
        if($request->hasFile('image')){
            
            if(isset($post->image)){
                Storage::delete($post->image);
            }
            $path = $request->file('image')->store('post-image');
        }
        
        $post = Post::findOrFail($id);

        // Remove deleted images
        if ($request->has('deleted_images')) {
            $deletedImages = $request->input('deleted_images');
            $imagePaths = $post->mult_image;
    
            foreach ($deletedImages as $index) {
                if (isset($imagePaths[$index])) {
                    Storage::delete($imagePaths[$index]);
                    unset($imagePaths[$index]);
                }
            }
    
            $post->mult_image = array_values($imagePaths); // Reset array keys
        }
    
        // Handle image uploads and storage
        $imagePaths = $post->mult_image; // Preserve existing images

        if ($request->hasFile('mult_image')) {
            foreach ($request->file('mult_image') as $image) {
                $mult = $image->store('post-mult-image');
                $imagePaths[] = $mult;
                
            }
        }

        $post->update([
            'category_id'=> $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ?? $post->image,
            'mult_image' => $imagePaths,

            
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
        
        if ($post->mult_image) {
            foreach ($post->mult_image as $image) {
                Storage::delete($image);
            }
        }

        $post->delete();
        return redirect()->route('home');
    }
}
