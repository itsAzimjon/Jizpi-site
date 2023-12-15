<?php

namespace App\Http\Controllers;

use App\Models\Appoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        Appoint::take();

        return view('components.create-appoint');
    }
    
    public function edit(Appoint $appoint)
    {
        return view('components.appoint-edit')->with(['appoint' => $appoint]);
    }

    public function update(Request $request, Appoint $appoint)
    {
               
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:348'
        ]);
        
        if($request->hasFile('image')){
            
            if(isset($appoint->image)){
                Storage::delete($appoint->image);
            }
            $path = $request->file('image')->store('appoint-image');
        }

        $appoint->update([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $path ?? $appoint->image
        ]);

        $enTranslations = file_get_contents(resource_path('lang/en.json'));
        $enTranslationsArray = json_decode($enTranslations, true);
        $enTranslationsArray[$request->title] = $request->title_en;
        $enTranslationsArray[$request->text] = $request->text_en;
        file_put_contents(resource_path('lang/en.json'), json_encode($enTranslationsArray));
        
        $ruTranslations = file_get_contents(resource_path('lang/ru.json'));
        $ruTranslationsArray = json_decode($ruTranslations, true);
        $ruTranslationsArray[$request->title] = $request->title_ru;
        $ruTranslationsArray[$request->text] = $request->text_ru;
        file_put_contents(resource_path('lang/ru.json'), json_encode($ruTranslationsArray));

        return redirect()->route('home');
    }
}