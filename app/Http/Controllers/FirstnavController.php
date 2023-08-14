<?php

namespace App\Http\Controllers;

use App\Models\Firstnav;
use App\Models\Secondnav;
use Illuminate\Http\Request;

class FirstnavController extends Controller
{       
    public function index()
    {
        $firstnavs = Firstnav::all();

        return view('layouts.navbar.show', compact('firstnavs'));
    }
    public function show(Firstnav $firstnav)
    {
        $firstnavs = Firstnav::all();
        return view('firstnavs.show', compact('firstnavs', 'firstnav'));
    }



    
}