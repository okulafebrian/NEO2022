<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Testimony;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'competitions' => Competition::all(),
            'testimonies' => Testimony::all(),
        ]);
    }
}
