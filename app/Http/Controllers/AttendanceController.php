<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Competition;
use App\Models\Environment;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use App\Models\Round;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('index');
        $this->middleware(['participant'])->except('index');
        $this->middleware(['admin'])->only('index');
    }
    
    public function index()
    {
        $rounds = Round::all();
        
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
        
        return view('attendances.index', [
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
        if (($request->round == 'Technical Meeting' && !$this->validateEnvironment('ENV006')) ||
            ($request->round == 'Coaching Clinic' && !$this->validateEnvironment('ENV007')) ||
            ($request->round == 'Preliminary' && !$this->validateEnvironment('ENV008')) ||
            ($request->round == 'Semifinal' && !$this->validateEnvironment('ENV009')) ||
            ($request->round == 'Final' && !$this->validateEnvironment('ENV010'))) {
            return redirect()->route('participant.dashboard')->with('failed', 'Attendance time has passed.');
        }
        
        $request->validate([
            'qualification_id' => 'required|integer'
        ]);

        $attendance = Attendance::where('qualification_id', $request->qualification_id)->first();

        if (!$attendance) {
            Attendance::create([
                'qualification_id' => $request->qualification_id
            ]);
        }
        
        return redirect()->back();
    }

    public function show(Attendance $attendance)
    {
        //
    }

    public function edit(Attendance $attendance)
    {
        //
    }

    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    public function destroy(Attendance $attendance)
    {
        //
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
