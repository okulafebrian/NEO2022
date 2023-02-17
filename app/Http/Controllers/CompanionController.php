<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use Illuminate\Http\Request;

class CompanionController extends Controller
{

    public function index()
    {
        return view('companions.index', [
            'companions' => Companion::whereHas('verifiedPayment')->get()
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
        return view('companions.edit', [
            'companion' => $companion
        ]);
    }

    public function update(Request $request, Companion $companion)
    {   
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string'
        ]);

        $companion->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number
        ]);

        return redirect()->route('companions.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Companion $companion)
    {
        //
    }
}
