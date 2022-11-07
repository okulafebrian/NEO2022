<?php

namespace App\Http\Controllers;

use App\Models\Binusian;
use App\Models\Competition;
use App\Models\DebateTeam;
use App\Models\Environment;
use App\Models\Participant;
use App\Models\Registration;
use App\Models\RegistrationDetail;
use App\Models\Representative;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
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
        $registrations = Registration::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $competitionSummaries = [];

        foreach ($registrations as $registration) {
            $competitions = DB::table('competitions')
                            ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                            ->select('competitions.name', 'competitions.category', 'registration_details.price', DB::raw('count(*) as registrations_count'))
                            ->where('registration_details.registration_id', $registration->id)
                            ->groupBy('competitions.name', 'competitions.category', 'registration_details.price')
                            ->get();

            $competitionSummaries[$registration->id] = $competitions;
        }
        
        return view('registrations.index', [
            'registrations' => $registrations,
            'competitionSummaries' => $competitionSummaries,
        ]);
    }

    public function create(Request $request)
    {   
        $competitions = Competition::withCount(['registrations', 'earlyRegistrations' => function (Builder $query) {
                            $query->where('payment_due', '>=', Carbon::now())
                                  ->orWhereHas('payment');
                        }])->get();   
        
        $totalPrice = 0;

        foreach ($competitions as $competition) {
            if ($request->ticket[$competition->id] > 0) {
                // VALIDATE TICKET
                if($this->validateTicket($competition, $request->type[$competition->id], $request->ticket[$competition->id]) == false)
                    return redirect()->route('dashboard')->with('failed', 'Tickets are sold out!');

                $totalPrice += $request->price[$competition->id] * $request->ticket[$competition->id];
            }
        }
        
        return view('registrations.create', [
            'competitions' => $competitions,
            'ticket' => $request->ticket,
            'price' => $request->price,
            'type' => $request->type,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function store(Request $request)
    {           
        $this->validate($request, [
            'price.*' => 'required|integer',
            'type.*' => 'required|string',
            'name.*.*.*' => 'required|string',
            'email.*.*.*' => 'required|string',
            'gender.*.*.*' => 'required|string',
            'province.*.*.*' => 'required|string',
            'district.*.*.*' => 'required|string',
            'address.*.*.*' => 'required|string',
            'phone_number.*.*.*' => 'required|string',
            'line_id.*.*.*' => 'required|string',
            'grade.*.*.*' => 'required|string',
            'institution.*.*.*' => 'required|string',
        ]);
        
        $registration = DB::transaction(function () use($request) {

            $registration = Registration::create([
                'user_id' => auth()->user()->id,
                'payment_due' => Carbon::now()->addHours(5),
            ]);

            if ($request->has('noRepresentative') == false) {
                Representative::create([
                    'registration_id' => $registration->id,
                    'name' => $request->representative_name,
                    'phone_number' => $request->representative_phone
                ]);
            }
            
            $competitions = Competition::withCount(['registrations', 'earlyRegistrations' => function (Builder $query) {
                $query->where('payment_due', '>=', Carbon::now())->orWhereHas('payment');
            }])->get(); 
            
            foreach ($competitions as $competition) {
                if ($request->ticket[$competition->id] > 0) {
                    // VALIDATE TICKET
                    if($this->validateTicket($competition, $request->type[$competition->id], $request->ticket[$competition->id]) == false)
                        return redirect()->route('dashboard')->with('failed', 'Tickets are sold out!');

                    for ($i=0; $i < $request->ticket[$competition->id]; $i++) {
                        $registrationDetail = RegistrationDetail::create([
                            'registration_id' => $registration->id,
                            'competition_id' => $competition->id,
                            'type' => $request->type[$competition->id],
                            'price' => $request->price[$competition->id],
                        ]);

                        if ($competition->name == 'Debate') {
                            DebateTeam::create([
                                'registration_detail_id' => $registrationDetail->id,
                                'name' => $request->debate_team_name[$i]
                            ]);
                        }

                        for ($j=0; $j < count($request->name[$competition->id][$i]); $j++) {            
                            $participant = Participant::create([
                                'name' => $request->name[$competition->id][$i][$j],
                                'registration_detail_id' => $registrationDetail->id,
                                'gender' => $request->gender[$competition->id][$i][$j],
                                'grade' => $request->grade[$competition->id][$i][$j],
                                'province' => $request->province[$competition->id][$i][$j],
                                'district' => $request->district[$competition->id][$i][$j],
                                'address' => $request->address[$competition->id][$i][$j],
                                'email' => $request->email[$competition->id][$i][$j],
                                'phone_number' => $request->phone_number[$competition->id][$i][$j],
                                'line_id' => $request->line_id[$competition->id][$i][$j],
                                'institution' => $request->institution[$competition->id][$i][$j],
                            ]);

                            if (str_contains($participant->grade, 'Year ') && $request->binusian[$competition->id][$i][$j]) {
                                Binusian::create([
                                    'participant_id' => $participant->id,
                                    'nim' => $request->nim[$competition->id][$i][$j],
                                    'region' => $request->region[$competition->id][$i][$j],
                                ]);
                            }
                        }
                    }                    
                }
            }
            return $registration;
        });
       
        return redirect()->route('payments.create', $registration)->with('success', 'Registration successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {   
        //
    }

    public function edit(Registration $registration)
    {
        //
    }

    public function update(Request $request, Registration $registration)
    {
        //
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->back();
    }

    public function manage()
    {   
        $registrations = Registration::all();
        $competitionSummaries = [];

        foreach ($registrations as $registration) {
            $competitions = DB::table('competitions')
                            ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                            ->select('competitions.name', 'competitions.category', 'registration_details.price', DB::raw('count(*) as registrations_count'))
                            ->where('registration_details.registration_id', $registration->id)
                            ->groupBy('competitions.name', 'competitions.category', 'registration_details.price')
                            ->get();

            $competitionSummaries[$registration->id] = $competitions;
        }
        
        return view('registrations.manage', [
            'unverifiedRegistrations' => Registration::whereRelation('payment', 'is_verified', null)->orderBy('created_at', 'DESC')->get(),
            'pendingPayments' => Registration::doesntHave('payment')->where('payment_due', '>=', Carbon::now())->orderBy('created_at', 'DESC')->get(),
            'verifiedRegistrations' => Registration::whereRelation('payment', 'is_verified', 1)->orderBy('created_at', 'DESC')->get(),
            'expiredRegistrations' => Registration::doesntHave('payment')->where('payment_due', '<', Carbon::now())->orderBy('created_at', 'DESC')->get(),
            'competitionSummaries' => $competitionSummaries,
        ]);
    }

    function validateTicket($competition, $type, $totalTicket)
    {   
        if ($type != 'NORMAL') {
            $isEarlyBirdOngoing = $this->validateEnvironment('EARLY BIRD');
            
            // CHECK IF EARLY BIRD IS ONGOING OR NOT
            if (!$isEarlyBirdOngoing) return false;
    
            // CHECK TICKET AVAILABILITY                            
            $remainingQuota = $competition->early_quota - $competition->early_registrations_count;

            if($totalTicket > $remainingQuota) return false;
        } else {
            // CHECK TICKET AVAILABILITY
            $remainingQuota = $competition->normal_quota - $competition->registrations_count;

            if($totalTicket > $remainingQuota) return false;
        }
        return true;
    }

    protected function validateEnvironment($name)
    {
        $environment = Environment::where('name', $name)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
