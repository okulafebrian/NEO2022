<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{

    public function index()
    {
        return view('testimonies.index', [
            'testimonies' => Testimony::all()
        ]);
    }

    public function create()
    {
        return view('testimonies.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('photo')->storeAs('public/images/testimonies', $proofNameToStore);
        }

        Testimony::create([
            'name' => $request->name,
            'photo' => $proofNameToStore,
            'role' => $request->role,
            'description' => $request->description
        ]);

        return redirect()->route('testimonies.index')->with('success', 'Data sucessfully added');
    }

    public function show(Testimony $testimony)
    {
        //
    }

    public function edit(Testimony $testimony)
    {
        return view('testimonies.edit', [
            'testimony' => $testimony
        ]);
    }

    public function update(Request $request, Testimony $testimony)
    {
        $this->validateRequest($request);
        
        if ($request->hasFile('photo')) {
            if ($testimony->photo != NULL)
                Storage::delete('public/images/testimonies/' . $testimony->photo);
            
            $extension = $request->file('photo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('photo')->storeAs('public/images/testimonies', $proofNameToStore);
        } else {
            $proofNameToStore = $testimony->photo;
        }

        $testimony->update([
            'name' => $request->name,
            'photo' => $proofNameToStore,
            'role' => $request->role,
            'description' => $request->description
        ]);

        return redirect()->route('testimonies.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Testimony $testimony)
    {
        //
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'name'=> 'required|string',
            'photo' => 'image|mimes:jpg,png,jpeg',
            'role'=> 'required|string',
            'description'=> 'required|string',
        ]);
    }
}
