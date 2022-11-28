<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Mail\AccountMail;
use App\Models\Binusian;
use App\Models\District;
use App\Models\Environment;
use App\Models\Province;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth'])->only('index', 'edit', 'update', 'export', 'sendAccountInfo', 'account', 'withdrawal');
        $this->middleware(['participant'])->except('index', 'edit', 'update', 'export', 'sendAccountInfo',  'account', 'withdrawal');
        $this->middleware(['admin'])->only('index', 'edit', 'update', 'export', 'sendAccountInfo', 'account', 'withdrawal');
    }
    
    public function __invoke()
    {   
        $qualifications = Qualification::where('registration_detail_id', Auth::guard('participant')->user()->registrationDetail->id)->orderBy('round_id', 'DESC')->get();
        $attendances = [];
        $submissions = [];

        foreach ($qualifications as $qualification) {
            // ATTENDANCES
            if ($qualification->round->name == 'Technical Meeting' && $this->validateEnvironment('ENV006')) {
                $attendances[$qualification->id] = 1;
            } elseif ($qualification->round->name == 'Coaching Clinic' && $this->validateEnvironment('ENV007')) {
                $attendances[$qualification->id] = 1;
            } elseif ($qualification->round->name == 'Preliminary' && $this->validateEnvironment('ENV008')) {
                $attendances[$qualification->id] = 1;
            } elseif ($qualification->round->name == 'Semifinal' && $this->validateEnvironment('ENV009')) {
                $attendances[$qualification->id] = 1;
            } elseif ($qualification->round->name == 'Final' && $this->validateEnvironment('ENV010')) {
                $attendances[$qualification->id] = 1;
            } else {
                $attendances[$qualification->id] = 0;
            }

            // SUBMISSIONS
            if ($qualification->registrationDetail->competition->name == 'Short Story Writing') {
                if ($qualification->round->name == 'Preliminary' && $this->validateEnvironment('ENV003')) {
                    $submissions[$qualification->id] = 1;
                } elseif ($qualification->round->name == 'Final' && $this->validateEnvironment('ENV004')) {
                    $submissions[$qualification->id] = 1;
                } else {
                    $submissions[$qualification->id] = 0;
                }
            } else if ($qualification->registrationDetail->competition->name == 'Speech') {
                if ($qualification->round->name == 'Preliminary' && $this->validateEnvironment('ENV005')) {
                    $submissions[$qualification->id] = 1;
                } else {
                    $submissions[$qualification->id] = 0;
                }
            } else {
                $submissions[$qualification->id] = 0;
            }
        }
        
        return view('dashboards.participant', [
            'attendances' => $attendances,
            'submissions' => $submissions,
            'qualifications' => $qualifications
        ]);
    }

    public function index()
    {   
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

        return view('participants.index', [
            'competitions' => $competitions,
        ]);
    }

    public function account()
    {   
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

        return view('participants.account', [
            'competitions' => $competitions,
        ]);
    }

    public function withdrawal()
    {   
        if (auth()->user()->email == 'neo.debate') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Debate')->get();
        } elseif (auth()->user()->email == 'neo.newscasting') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Newscasting')->get();
        } elseif (auth()->user()->email == 'neo.ssw') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Short Story Writing')->get();
        } elseif (auth()->user()->email == 'neo.speech') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Speech')->get();
        } else {
            $registrationDetails = RegistrationDetail::onlyTrashed()->get();
        }
        
        return view('participants.withdrawal', [
            'registrationDetails' => $registrationDetails,
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
            'provinces' => Province::all()
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
            'allergy' => 'required|string',
        ]);
        
        DB::transaction(function () use($request, $participant) {
            if ($request->hasFile('vaccination')) {
                if ($participant->vaccination != NULL)
                    Storage::delete('public/images/vaccinations/' . $participant->vaccination);  
                
                $extension = $request->file('vaccination')->getClientOriginalExtension();
                $proofNameToStore = $request->input('name') . '.' . $extension;
                $request->file('vaccination')->storeAs('public/images/vaccinations', $proofNameToStore);
            } else {
                $proofNameToStore = $participant->vaccination;
            }

            $participant->update([
                'name' => ucwords($request->name),
                'gender' => $request->gender,
                'grade' => $request->grade,
                'province_id' => $request->province,
                'district_id' => $request->district,
                'address' => $request->address,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'line_id' => $request->line_id,
                'institution' => $request->institution,
                'vaccination' => $proofNameToStore,
                'allergy' => $request->allergy,
            ]);
 
            if ((!str_contains($participant->grade, 'Year ') && $participant->binusian) || (str_contains($participant->grade, 'Year ') && !$request->binusian && $participant->binusian)) {
                $binusian = Binusian::where('participant_id', $participant->id);

                $binusian->delete();
            } elseif (str_contains($participant->grade, 'Year ') && $request->binusian && $participant->binusian) {
                $binusian = Binusian::where('participant_id', $participant->id);

                $binusian->update([
                    'nim' => $request->nim,
                    'region' => $request->region,
                    'faculty_id' => $request->faculty,
                    'major_id' => $request->major,
                ]);
            } elseif (str_contains($participant->grade, 'Year ') && $request->binusian) {
                Binusian::create([
                    'participant_id' => $participant->id,
                    'nim' => $request->nim,
                    'region' => $request->region,
                    'faculty_id' => $request->faculty,
                    'major_id' => $request->major,
                ]);
            }
        });

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

    public function sendAccountInfo(Participant $participant)
    {   
        Mail::to($participant->email)->send(new AccountMail($participant));

        return redirect()->back()->with('success', 'Account info successfully sent.');
    }

    public function showLoginForm()
    {
        return view('auth.login-participant');
    }

    public function login()
    {
        return view('auth.login-participant');
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
