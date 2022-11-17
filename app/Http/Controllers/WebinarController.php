<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index()
    {
        return view('webinars.index');
    }
}
