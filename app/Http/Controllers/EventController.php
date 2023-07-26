<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        $categories = Category::all();

        return view('layouts.main.event', compact('events', 'categories'));


    }

    public function create()
    {
        return view('events.create')->with([
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('post-image');
        
        Event::create([
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

    public function show(Event $event)
    {
        $events = Event::all();
        return view('events.show', compact('events', 'event'));
    }


    public function edit(Event $event)
    {
        return view('events.edit')->with(['event' => $event, 'categories' => Category::all()]);
    }

    public function update(Request $request, Event $event)
    {
        if($request->hasFile('image')){
            
            if(isset($event->image)){
                Storage::delete($event->image);
            }
            $path = $request->file('image')->store('event$event-image');
        }

        $event->update([
            'category_id'=> $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ?? $event->image,
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

        return redirect()->route('events.show', ['event' => $event->id]);
    }

    public function destroy(Event $event)
    {
        Storage::delete($event->image);

        $event->delete();

        return redirect()->route('home');
    }
}
