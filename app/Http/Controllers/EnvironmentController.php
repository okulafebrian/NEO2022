<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin']);
        $this->middleware('access.control:1');
    }

    public function index()
    {   
        $environments = Environment::all();

        return view('environments.index', [
            'environments' => $environments,
        ]);
    }

    public function create()
    {
         return view('environments.create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'code' => 'required|string|unique:environments',
            'name' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        Environment::create([
            'code' => $request->code,
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('environments.index')->with('success', 'Data sucessfully added');
    }

    public function show(Environment $environment)
    {
        //
    }

    public function edit(Environment $environment)
    {
        return view('environments.edit', [
            'environment' => $environment
        ]);
    }

    public function update(Request $request, Environment $environment)
    {   
        $request->validate([
            'name' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        $environment->update([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('environments.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Environment $environment)
    {
        $environment->delete();

        return redirect()->route('environments.index')->with('success', 'Data successfully deleted!');
    }
}
