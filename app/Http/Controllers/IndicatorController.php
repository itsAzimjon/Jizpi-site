<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function index()
    {
     
    }

  

   
    public function update(Request $request, Indicator $indicator)
    {
        $this->validate($request, [
            'number' => 'required',
       
        ]);
        
        $indicator->update([
            'number' => $request->number,
        ]);

    }


}
