<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\CompetitionTeam;
use App\Models\DebateTeamName;
use App\Models\Participant;
use App\Models\ReRegistration;
use App\Models\Round;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ReRegistrationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['user'])->except('manage');
        $this->middleware(['admin'])->only('manage', 'destroy');
        // $this->middleware('access.control:10')->except('index');
    }
    
    public function index()
    {   
        $rounds = Round::all();
        $competitions = Competition::all();
        $participants = [];

        foreach ($rounds as $round) {
            foreach ($competitions as $competition) {
                $temp = Participant::whereRelation('competitionTeam', 'competition_id', $competition->id)
                        ->whereRelation('rounds', 'rounds.id', $round->id)->get();

                $participants[$round->id][$competition->id] =  $temp;
            }
        }
        
        return view('re-registrations.index', [
            'rounds' => $rounds,
            'competitions' => $competitions,
            'participants' => $participants,
        ]);
    }

    public function create(Round $round, Competition $competition)
    { 
        // return view('re-registrations.create', [
        //     'round' => $round,
        //     'competition' => $competition
        // ]);
    }

    public function store(Request $request)
    {   
        $data = [];

        if ($request->competition_name == 'Debate') {
            $participants = Participant::whereIn('registration_detail_id', $request->registration_detail_id)->get();
            
            foreach ($participants as $participant) {
                $data[] = [
                    'round_id' => $request->round_id,
                    'participant_id' => $participant->id
                ]; 
            }
        } else {
            for ($i=0; $i < count($request->participant_id); $i++) { 
                $data[] = [
                    'round_id' => $request->round_id,
                    'participant_id' => $request->participant_id[$i]
                ]; 
            }
        }

        ReRegistration::insert($data);

        return redirect()->route('re-registrations.index')->with('success', 'Data sucessfully added');
    }

    public function show(ReRegistration $reRegistration)
    {
        //
    }

    public function edit(ReRegistration $reRegistration)
    {
        //
    }

    public function update(Request $request, ReRegistration $reRegistration)
    {
        //
    }

    public function destroy(ReRegistration $reRegistration)
    {
        //
    }
}
