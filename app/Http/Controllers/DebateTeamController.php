<?php

namespace App\Http\Controllers;

use App\Models\DebateTeam;
use Illuminate\Http\Request;

class DebateTeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin']);
        // $this->middleware('access.control:10')->except('index');
    }

    public function index()
    {   
        return view('debate-teams.index', [
            'debateTeams' => DebateTeam::all()
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

    public function show(DebateTeam $debateTeam)
    {
        //
    }

    public function edit(DebateTeam $debateTeam)
    {
        return view('debate-teams.edit', [
            'debateTeam' => $debateTeam
        ]);
    }

    public function update(Request $request, DebateTeam $debateTeam)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $debateTeam->update([
            'name' => $request->name,
        ]);

        return redirect()->route('debate-teams.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(DebateTeam $debateTeam)
    {
        //
    }
}
