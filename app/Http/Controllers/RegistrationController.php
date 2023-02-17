<?php

namespace App\Http\Controllers;

use App\Models\Binusian;
use App\Models\Competition;
use App\Models\DebateTeam;
use App\Models\Environment;
use App\Models\Participant;
use App\Models\Refund;
use App\Models\Registration;
use App\Models\RegistrationDetail;
use App\Models\Companion;
use App\Models\District;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Province;
use App\Models\Qualification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['user'])->except('manage', 'destroy');
        $this->middleware(['admin'])->only('manage', 'destroy');
        $this->middleware('access.control:3')->only('manage', 'destroy');
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
        if (!$this->validateEnvironment('ENV001')) {
            return redirect()->back()->with('error', 'Registration Closed');
        }

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
            'provinces' => Province::all()
        ]);
    }

    public function store(Request $request)
    {   
        if (!$this->validateEnvironment('ENV001')) {
            return redirect()->back()->with('error', 'Registration Closed');
        }

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
            'vaccination.*.*.*' => 'required|image|max:1999|mimes:jpg,png,jpeg',
            'allergy.*.*.*' => 'required|string'
        ]);
        
        $registration = DB::transaction(function () use($request) {
            $registration_time  = Environment::where('code', 'ENV001')->first();
            
            // SET PAYMENT DUE
            if (strtotime(Carbon::now()->addHours(5)) > strtotime($registration_time->end_time)) {
                $diff = round((strtotime($registration_time->end_time) - strtotime(Carbon::now())) / 60);
                $payment_due = Carbon::now()->addMinutes($diff);
            } else {
                $payment_due = Carbon::now()->addHours(5);
            }
            
            $registration = Registration::create([
                'user_id' => auth()->user()->id,
                'payment_due' => $payment_due,
            ]);

            if ($request->has('companion_name')) {
                Companion::create([
                    'registration_id' => $registration->id,
                    'name' => $request->companion_name,
                    'phone_number' => $request->companion_phone
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
                            $vaccination = 'vaccination.' . $competition->id . '.' . $i . '.' . $j;
                            
                            if ($request->hasFile($vaccination)) {
                                $extension = $request->file($vaccination)->getClientOriginalExtension();
                                $proofNameToStore = $request->name[$competition->id][$i][$j] . '.' . $extension;
                                $request->file($vaccination)->storeAs('public/images/vaccinations', $proofNameToStore);
                            }

                            $participant = Participant::create([
                                'name' => ucwords($request->name[$competition->id][$i][$j]),
                                'registration_detail_id' => $registrationDetail->id,
                                'gender' => $request->gender[$competition->id][$i][$j],
                                'grade' => $request->grade[$competition->id][$i][$j],
                                'province_id' => $request->province[$competition->id][$i][$j],
                                'district_id' => $request->district[$competition->id][$i][$j],
                                'address' => $request->address[$competition->id][$i][$j],
                                'email' => $request->email[$competition->id][$i][$j],
                                'phone_number' => $request->phone_number[$competition->id][$i][$j],
                                'line_id' => $request->line_id[$competition->id][$i][$j],
                                'institution' => $request->institution[$competition->id][$i][$j],
                                'vaccination' => $proofNameToStore,
                                'allergy' => $request->allergy[$competition->id][$i][$j],
                            ]);

                            if (str_contains($participant->grade, 'Year ') && $request->binusian[$competition->id][$i][$j]) {
                                Binusian::create([
                                    'participant_id' => $participant->id,
                                    'nim' => $request->nim[$competition->id][$i][$j],
                                    'region' => $request->region[$competition->id][$i][$j],
                                    'faculty_id' => $request->faculty[$competition->id][$i][$j],
                                    'major_id' => $request->major[$competition->id][$i][$j],
                                ]);
                            }
                        }
                    }                    
                }
            }
            return $registration;
        });
       
        return redirect()->route('payments.create', $registration);
    }
    
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

        return redirect()->back()->with('success', 'Data successfully deleted!');
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
            'refunds' => Refund::withTrashed()->orderBy('created_at', 'DESC')->get(),
            'newRefund' => Refund::where('is_verified', null)->count(),
            'competitionSummaries' => $competitionSummaries,
        ]);
    }

    function validateTicket($competition, $type, $totalTicket)
    {   
        if ($type != 'NORMAL') {
            $isEarlyBirdOngoing = $this->validateEnvironment('ENV002');
            
            // CHECK IF EARLY BIRD IS ONGOING OR NOT
            if (!$isEarlyBirdOngoing) return false;
    
            // CHECK TICKET AVAILABILITY                            
            $remainingQuota = $competition->early_quota - $competition->early_registrations_count;

            if($totalTicket > $remainingQuota) return false;
        } else {
            // CHECK TICKET AVAILABILITY
            $remainingQuota = $competition->total_quota - $competition->registrations_count;

            if($totalTicket > $remainingQuota) return false;
        }
        return true;
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
