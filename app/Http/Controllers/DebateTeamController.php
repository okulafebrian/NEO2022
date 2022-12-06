<?php

namespace App\Http\Controllers;

use App\Models\DebateTeam;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //
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
            'team_name' => 'required|string',
        ]);

        $debateTeam->update([
            'name' => $request->team_name,
        ]);
        
        return redirect()->route('participants.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(DebateTeam $debateTeam)
    {
        //
    }
}
