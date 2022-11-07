<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['participant'])->only('invoke');
        $this->middleware(['admin'])->except('invoke');
        // $this->middleware('access.control:10')->except('index');
    }
    
    public function __invoke()
    {   
        return view('dashboards.participant');
    }

    public function index()
    {   
        $competitions = Competition::all();

        return view('participants.index', [
            'competitions' => $competitions,
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

    public function show(Participant $participant)
    {
        //
    }

    public function edit(Participant $participant)
    {   
        return view('participants.edit', [
            'participant' => $participant,
        ]);
    }

    public function update(Request $request, Participant $participant)
    {   
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'gender' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'line_id' => 'required|string',
            'grade' => 'required|string',
            'institution' => 'required|string',
        ]);

        $participant->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'province' => $request->province,
            'district' => $request->district,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'line_id' => $request->line_id,
            'institution' => $request->institution,
        ]);

        return redirect()->route('participants.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Participant $participant)
    {
        //
    }

    public function showLoginForm()
    {
        return view('auth.login-participant');
    }

    public function login()
    {
        return view('auth.login-participant');
    }
}
