<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ParticipantExport;
use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Environment;
use App\Models\Qualification;

class ParticipantController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth'])->only('index', 'edit', 'update', 'export');
        $this->middleware(['participant'])->except('index', 'edit', 'update', 'export');
        $this->middleware(['admin'])->only('index', 'edit', 'update', 'export');
        // $this->middleware('access.control:10')->except('index');
    }
    
    public function __invoke()
    {   
        $qualifications = Qualification::where('registration_detail_id', Auth::guard('participant')->user()->registrationDetail->id)->get();
        $environments = Environment::where('start_time', null)->get();

        $attendanceQualifications = [];
        $submissionQualifications = [];
        $reRegisterQualifications = [];

        foreach ($qualifications as $qualification) {
            // ATTENDANCES
            if ($qualification->round->name == 'Preliminary' && $environments[3]->is_shown == true) {
                $attendanceQualifications[] = $qualification;
            } elseif ($qualification->round->name == 'Semifinal' && $environments[4]->is_shown == true) {
                $attendanceQualifications[] = $qualification;
            } elseif ($qualification->round->name == 'Final' && $environments[5]->is_shown == true) {
                $attendanceQualifications[] = $qualification;
            }

            // SUBMISSIONS
            if ($qualification->registrationDetail->competition->name == 'Short Story Writing') {
                if ($qualification->round->name == 'Preliminary' && $environments[1]->is_shown == true) {
                    $submissionQualifications[] = $qualification;
                } elseif ($qualification->round->name == 'Final' && $environments[2]->is_shown == true) {
                    $submissionQualifications[] = $qualification;
                }
            }

            // RE-REGISTRATION
            if ($qualification->round->name == 'Semifinal' && $environments[0]->is_shown == true) {
                $reRegisterQualifications[] = $qualification;
            }
        }
        
        return view('dashboards.participant', [
            'attendanceQualifications' => $attendanceQualifications,
            'submissionQualifications' => $submissionQualifications,
            'reRegisterQualifications' => $reRegisterQualifications
        ]);
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

    public function export()
    {
        return Excel::download(new ParticipantsExport, 'participant.xlsx');
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
