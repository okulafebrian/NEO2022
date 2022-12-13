<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin']);
        $this->middleware('access.control:7');
    }

    public function index()
    {
        return view('supports.index', [
            'supports' => Support::all()
        ]);
    }

    public function create()
    {
        return view('supports.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/supports', $proofNameToStore);
        }

        Support::create([
            'name' => $request->name,
            'category' => $request->category,
            'logo' => $proofNameToStore
        ]);

        return redirect()->route('supports.index')->with('success', 'Data sucessfully added');
    }

    public function show(Support $support)
    {
        //
    }

    public function edit(Support $support)
    {
        return view('supports.edit', [
            'support' => $support
        ]);
    }

    public function update(Request $request, Support $support)
    {
        $this->validateRequest($request);

        if ($request->hasFile('logo')) {
            if ($support->logo != NULL)
                Storage::delete('public/images/supports/' . $support->logo);
            
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/supports', $proofNameToStore);
        } else {
            $proofNameToStore = $support->logo;
        }

        $support->update([
            'name' => $request->name,
            'category' => $request->category,
            'logo' => $proofNameToStore
        ]);

        return redirect()->route('supports.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Support $support)
    {
        $support->delete();

        return redirect()->route('supports.index')->with('success', 'Data successfully deleted!');
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'name'=> 'required|string',
            'logo' => 'image|mimes:jpg,png,jpeg',
            'category'=> 'required|string'
        ]);
    }
}
