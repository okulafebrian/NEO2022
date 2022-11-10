<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use App\Models\ReRegistration;
use App\Models\Round;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ReRegistrationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth'])->only('index');
        $this->middleware(['participant'])->except('index');
        $this->middleware(['admin'])->only('index');
        // $this->middleware('access.control:10')->except('index');
    }
    
    public function index()
    {   
        $rounds = Round::all();
        $competitions = Competition::all();
        $qualifications = [];

        foreach ($rounds as $round) {
            foreach ($competitions as $competition) {
                $temp = Qualification::where('round_id', $round->id)
                        ->whereRelation('registrationDetail', 'competition_id', $competition->id)->get();

                $qualifications[$round->id][$competition->id] =  $temp;
            }
        }
        
        return view('re-registrations.index', [
            'rounds' => $rounds,
            'competitions' => $competitions,
            'qualifications' => $qualifications,
        ]);
    }

    public function create()
    { 
        //
    }

    public function store(Request $request)
    {   
        $request->validate([
            'qualification_id' => 'required|integer',
            'participant_id' => 'required|integer',
            'vaccination' => 'required|file|mimes:jpg,jpeg,png,pdf'
        ]);

        DB::transaction(function () use($request) {
            $participant = Participant::find($request->participant_id);
            
            if ($request->hasFile('vaccination')) {
                $extension = $request->file('vaccination')->getClientOriginalExtension();
                $proofNameToStore = $participant->name . '_Vaccination' . '.' . $extension;
                $request->file('vaccination')->storeAs('public/vaccinations', $proofNameToStore);
            }

            $participant->update([
                'allergy' => $request->allergy == null ? 'None' : $request->allergy,
                'vaccination' => $proofNameToStore
            ]);

            $reRegistration = ReRegistration::where('qualification_id', $request->qualification_id)->first();
            
            if (!$reRegistration) {
                ReRegistration::create([
                    'qualification_id' => $request->qualification_id
                ]);
            }
        });

        return redirect()->back();
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
