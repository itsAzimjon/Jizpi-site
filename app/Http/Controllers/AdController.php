<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::all();

        return view('layouts.main.ads', compact('ads'));
    }

    public function show(Ad $ad)
    {
        $ads = Ad::all();
        return view('ads.show', compact('ad', 'ads'));
    }
}
