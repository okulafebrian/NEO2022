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
        $periodEnvironments = Environment::where('is_shown', null)->get();
        $toggleEnvironments = Environment::where('start_time', null)->get();

        return view('environments.index', [
            'periodEnvironments' => $periodEnvironments,
            'toggleEnvironments' => $toggleEnvironments,
        ]);
    }

    public function create()
    {
         return view('environments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        if ($request->has('is_shown')) {
            Environment::create([
                'name' => strtoupper($request->name),
                'is_shown' => $request->is_shown
            ]);
        } else {
            Environment::create([
                'name' => strtoupper($request->name),
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        }

        return redirect()->route('environments.index')->with('success', $request->name . ' sucessfully added');
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
