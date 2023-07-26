<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Welcome;
use App\Models\Post;
use App\Models\Ad;
use App\Models\Appoint;
use App\Models\Event;
use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class WelcomeController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        $welcomes = Welcome::all();
        $categories = Category::all();
        $ads = Ad::all();
        $appoint = Appoint::all();
        $events = Event::paginate(3);
        $indicators = Indicator::all();

        return view('welcome', compact('posts', 'welcomes', 'categories', 'ads', 'appoint', 'events', 'indicators'));
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
        
        return redirect('/');
    }

    public function destroy(Welcome $welcome)
    {
        Storage::delete($welcome->image);

        $welcome->delete();

        return redirect()->route('home');
    }
}
