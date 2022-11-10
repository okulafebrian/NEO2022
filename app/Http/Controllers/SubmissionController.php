<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use App\Models\Round;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('index', 'download');
        $this->middleware(['participant'])->except('index', 'download');
        $this->middleware(['admin'])->only('index', 'download');
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
}
