<?php

namespace App\Http\Controllers;

use App\Models\Secondnav;
use App\Models\Thirdnav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThirdnavController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function build($id)
    {
        $secondnav = Secondnav::findOrFail($id);
        
        return view('secondnavs.create', compact('secondnav'));    

    }

    public function store(Request $request)
    {
   
        $this->validate($request, [
            'secondnav_id'  => 'required',
            'title'  => 'required',
            'link'  => 'required',
            'pdf' => 'file|mimes:pdf|max:5048', // Replace 2048 with your desired max file size in KB
        ]);

        $path = null;

        if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {
            $path = $request->file('pdf')->store('nav-pdf');
        } else {
            // Handle the case when the file is not uploaded successfully or not found.
            // You might want to add some error messages or logging here.
        }
    

        Thirdnav::create([
            'secondnav_id' => $request->secondnav_id,
            'title' => $request->title,
            'link' => $request->link,
            'pdf' => $path
        ]);
        

        $enTranslations = file_get_contents(resource_path('lang/en.json'));
        $enTranslationsArray = json_decode($enTranslations, true);
        $enTranslationsArray[$request->title] = $request->title_en;
        file_put_contents(resource_path('lang/en.json'), json_encode($enTranslationsArray));
        
        $ruTranslations = file_get_contents(resource_path('lang/ru.json'));
        $ruTranslationsArray = json_decode($ruTranslations, true);
        $ruTranslationsArray[$request->title] = $request->title_ru;
        file_put_contents(resource_path('lang/ru.json'), json_encode($ruTranslationsArray));

        return redirect()->route('home');
    }

    public function edit(Thirdnav $thirdnav)
    {
        return view('secondnavs.edit')->with(['thirdnav' => $thirdnav]);
    }

    public function update(Request $request, Thirdnav $thirdnav)
    {
        
        $this->validate($request, [
            'secondnav_id'  => 'required',
            'title'  => 'required',
            'link'  => 'required',
            'pdf' => 'file|mimes:pdf|max:5048', // Replace 2048 with your desired max file size in KB
        ]);
        
        if($request->hasFile('pdf')){
            
            if(isset($thirdnav->pdf)){
                Storage::delete($thirdnav->pdf);
            }
            $path = $request->file('pdf')->store('nav-pdf');
        }

        $thirdnav->update([
            'title' => $request->title,
            'link' => $request->link,
            'pdf' => $path ?? $thirdnav->pdf,
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

    
    public function destroy(Thirdnav $thirdnav){
        Storage::delete($thirdnav->pdf);
        $thirdnav->delete();

        return redirect('/');
    }
}
