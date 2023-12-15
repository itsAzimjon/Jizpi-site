<?php

namespace App\Http\Controllers;

use App\Models\Firstnav;
use App\Models\Secondnav;
use App\Models\Thirdnav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SecondnavController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(Secondnav $secondnav, Thirdnav $thirdnav)
    {
        $secondnavs = Secondnav::all();
        $secondnavs = Thirdnav::all();
        $hasPdfAttached = $secondnav->thirdnav->contains('pdf', '!=', null);

        return view('secondnavs.show', compact('secondnavs', 'secondnav', 'thirdnav',  'hasPdfAttached'));
    }

    public function create()
    {
        return view('firstnavs.create')->with([
            'navs' => Firstnav::all()
        ]);
    }

    public function store(Request $request, Firstnav $firstnav)
    {
                   
        $this->validate($request, [
            'firstnav_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:348'
        ]);
        
        $path = null;
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('nav-image');
        } else {
           
        }        
        Secondnav::create([
            'firstnav_id'=> $request->firstnav_id,
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
        
        return redirect()->route('firstnavs.show', ['firstnav' => $request->firstnav_id]);
    }

    public function edit(Secondnav $secondnav)
    {
        return view('firstnavs.edit')->with(['secondnav' => $secondnav]);
    }

    public function update(Request $request, Secondnav $secondnav)
    {
                   
        $this->validate($request, [
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:348'
        ]);
        
        if($request->hasFile('image')){
            
            if(isset($secondnav->image)){
                Storage::delete($secondnav->image);
            }
            $path = $request->file('image')->store('nav-image');
        }

        $secondnav->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ?? $secondnav->image,
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

    public function destroy(Secondnav $secondnav){
        Storage::delete($secondnav->image);
        $secondnav->delete();

        return redirect()->route('home');
    }
}

