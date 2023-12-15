<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $ads = Ad::all();

        return view('ads.index', compact('ads'));
    }

    public function show(Ad $ad)
    {
        $ads = Ad::all();
        return view('ads.show', compact('ad', 'ads'));
    }

    public function create(){
        return view('ads.create');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:348'
        ]);

        $path = $request->file('image')->store('ad-image');

        Ad::create([
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $enTranslations = file_get_contents(resource_path('lang/en.json'));
        $enTranslateArray = json_decode($enTranslations, true);
        $enTranslateArray[$request->title] = $request->title_en;
        $enTranslateArray[$request->description] = $request->description_en;
        file_put_contents(resource_path('lang/en.json'), json_encode($enTranslateArray));
        
        $ruTranslations = file_get_contents(resource_path('lang/ru.json'));
        $ruTranslationsArray = json_decode($ruTranslations, true);
        $ruTranslationsArray[$request->title] = $request->title_ru;
        $ruTranslationsArray[$request->description] = $request->description_ru;
        file_put_contents(resource_path('lang/ru.json'), json_encode($ruTranslationsArray));

        return redirect()->route('home');
    }

    public function edit(Ad $ad){
        return view('ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
                   
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:348'
        ]);
        
        if($request->hasFile('image')){
            
            if(isset($ad->image)){
                Storage::delete($ad->image);
            }
            $path = $request->file('image')->store('ad-image');
        }

        $ad->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ?? $ad->image,
        ]);

        $enTranslations = file_get_contents(resource_path('lang/en.json'));
        $enTranslateArray = json_decode($enTranslations, true);
        $enTranslateArray[$request->title] = $request->title_en;
        $enTranslateArray[$request->description] = $request->description_en;
        file_put_contents(resource_path('lang/en.json'), json_encode($enTranslateArray));
        
        $ruTranslations = file_get_contents(resource_path('lang/ru.json'));
        $ruTranslationsArray = json_decode($ruTranslations, true);
        $ruTranslationsArray[$request->title] = $request->title_ru;
        $ruTranslationsArray[$request->description] = $request->description_ru;
        file_put_contents(resource_path('lang/ru.json'), json_encode($ruTranslationsArray));

        return redirect()->route('ads.show', ['ad' => $ad->id]);
    }

    public function destroy(Ad $ad){

        Storage::delete($ad->image);

        $ad->delete();

        return redirect()->route('home');
    }
}
