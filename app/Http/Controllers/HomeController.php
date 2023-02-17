<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\FAQ;
use App\Models\Support;
use App\Models\Testimony;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'competitions' => Competition::all(),
            'testimonies' => Testimony::all(),
            'faqs' => FAQ::where('category', 'general')->take(6)->get(),
            'sponsors' => Support::where('category', 'Sponsor')->get(),
            'medpars' => Support::where('category', 'Media Partner')->get(),
        ]);
    }
}
