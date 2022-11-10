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
            'particiapnt_id.*' => 'required|integer',
            'name.*' => 'required|string',
            'email.*' => 'required|string',
            'gender.*' => 'required|string',
            'province.*' => 'required|string',
            'district.*' => 'required|string',
            'address.*' => 'required|string',
            'phone_number.*' => 'required|string',
            'line_id.*' => 'required|string',
            'grade.*' => 'required|string',
            'institution.*' => 'required|string',
        ]);
        
        DB::transaction(function () use($request, $debateTeam) {
            $debateTeam->update([
                'name' => $request->team_name,
            ]);

            for ($i=0; $i < count($request->name); $i++) { 
                $participant = Participant::find($request->participant_id[$i]);
                
                $participant->update([
                    'name' => $request->name[$i],
                    'gender' => $request->gender[$i],
                    'grade' => $request->grade[$i],
                    'province' => $request->province[$i],
                    'district' => $request->district[$i],
                    'address' => $request->address[$i],
                    'email' => $request->email[$i],
                    'phone_number' => $request->phone_number[$i],
                    'line_id' => $request->line_id[$i],
                    'institution' => $request->institution[$i],
                ]);
            }
        });

        return redirect()->route('participants.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(DebateTeam $debateTeam)
    {
        //
    }
}
