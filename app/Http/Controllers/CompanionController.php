<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use Illuminate\Http\Request;

class CompanionController extends Controller
{

    public function index()
    {
        return view('companions.index', [
            'companions' => Companion::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Companion $companion)
    {
        //
    }

    public function edit(Companion $companion)
    {
        //
    }

    public function update(Request $request, Companion $companion)
    {
        //
    }

    public function destroy(Companion $companion)
    {
        //
    }
}
