<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Environment;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use App\Models\Round;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('index', 'download');
        $this->middleware(['participant'])->except('index', 'download');
        $this->middleware(['admin'])->only('index', 'download');
    }

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
        
        return view('submissions.index', [
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
        if ($request->competition != 'Short Story Writing' && $request->competition != 'Speech') {
            return redirect()->route('participant.dashboard')->with('failed', 'Not authorized!');
        }

        if ($request->competition == 'Short Story Writing') {
            if (($request->round == 'Preliminary' && !$this->validateEnvironment('ENV003')) || $request->round == 'Final' && !$this->validateEnvironment('ENV004')) {
                return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
            }
        } else if ($request->competition == 'Speech') {
            if ($request->round == 'Preliminary' && !$this->validateEnvironment('ENV005')) {
                return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
            }
        }
        
        $request->validate([
            'qualification_id' => 'required|integer',
            'file' => 'required|file|mimes:pdf'
        ]);
        
        if ($request->hasFile('file')) {
            $proofNameToStore = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/submissions', $proofNameToStore);
        }

        Submission::create([
            'qualification_id' => $request->qualification_id,
            'file' => $proofNameToStore
        ]);

        return redirect()->back();
    }

    public function show(Submission $submission)
    {
        //
    }

    public function edit(Submission $submission)
    {
        //
    }

    public function update(Request $request, Submission $submission)
    {
        //
    }

    public function destroy(Submission $submission)
    {
        //
    }

    public function download(Submission $submission)
    {
        return response()->download(public_path('/storage/submissions/'. $submission->file));
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
