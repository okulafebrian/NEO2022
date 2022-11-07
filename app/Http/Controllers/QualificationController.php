<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use App\Models\Round;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    
    public function index()
    {
        $rounds = Round::all();
        $competitions = Competition::all();
        $registrationDetails = [];

        foreach ($rounds as $round) {
            foreach ($competitions as $competition) {
                $temp = RegistrationDetail::where('competition_id', $competition->id)
                        ->whereRelation('rounds', 'rounds.id', $round->id)->get();

                $registrationDetails[$round->id][$competition->id] =  $temp;
            }
        }
        
        return view('qualifications.index', [
            'rounds' => $rounds,
            'competitions' => $competitions,
            'registrationDetails' => $registrationDetails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Round $round, Competition $competition)
    {   
        return view('qualifications.create', [
            'round' => $round,
            'competition' => $competition
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qualification $qualification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        //
    }
}
