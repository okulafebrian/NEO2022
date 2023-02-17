<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use App\Models\Round;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QualificationController extends Controller
{
    
    public function index()
    {
        $rounds = Round::where([['id', '!=', 1], ['id', '!=', 2]])->get();
        
        if (auth()->user()->email == 'neo.debate') {
            $competitions = Competition::where('name', 'Debate')->get();
        } elseif (auth()->user()->email == 'neo.newscasting') {
            $competitions = Competition::where('name', 'Newscasting')->get();
        } elseif (auth()->user()->email == 'neo.ssw') {
            $competitions = Competition::where('name', 'Short Story Writing')->get();
        } elseif (auth()->user()->email == 'neo.speech') {
            $competitions = Competition::where('name', 'Speech')->get();
        } else {
            $competitions = Competition::all();
        }

        $qualifications = [];

        foreach ($rounds as $round) {
            foreach ($competitions as $competition) {
                $temp = Qualification::where('round_id', $round->id)
                        ->whereRelation('registrationDetail', 'competition_id', $competition->id)->get();

                $qualifications[$round->id][$competition->id] =  $temp;
            }
        }
        
        return view('qualifications.index', [
            'rounds' => $rounds,
            'competitions' => $competitions,
            'qualifications' => $qualifications,
        ]);
    }

    public function create(Round $round, Competition $competition)
    {   
        $registrationDetails = RegistrationDetail::whereHas('verifiedPayment')
            ->whereDoesntHave('rounds', function (Builder $query) use($round) {
                $query->where('rounds.id', $round->id);
            })->where('competition_id', $competition->id)
            ->get();

        return view('qualifications.create', [
            'round' => $round,
            'competition' => $competition,
            'registrationDetails' => $registrationDetails
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'round_id' => 'required|integer',
            'registration_detail_id.*' => 'required|integer'
        ]);
        
        $data = [];

        for ($i=0; $i < count($request->registration_detail_id); $i++) { 
            $data[] = [
                'round_id' => $request->round_id,
                'registration_detail_id' => $request->registration_detail_id[$i]
            ]; 
        }
        
        Qualification::insert($data);

        return redirect()->route('qualifications.index')->with('success', 'Data sucessfully added');
    }

    public function show(Qualification $qualification)
    {
        //
    }

    public function edit(Qualification $qualification)
    {
        //
    }

    public function update(Request $request, Qualification $qualification)
    {
        //
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

        return redirect()->back();
    }
}
