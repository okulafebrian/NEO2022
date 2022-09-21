<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Offer;
use App\Models\Participant;
use App\Models\Registration;
use App\Models\RegistrationDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        return view('registrations.index', [
            'registrations' => Registration::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        $ticketAmount = $request->ticketAmount; // Jumlah tiket dari tiap competition
        $offerID = $request->offerID;
        
        // REGISTRATION REQUEST VALIDATION
        if (!$this->checkOffer($offerID))
            return redirect()->route('dashboard')->with('failed', 'Registration failed. Please try again.');

        $competitions = Competition::all();
        $selectedCompetitions = [];
        $totalPrice = 0;

        foreach ($competitions as $competition) {
            if ($ticketAmount[$competition->id] > 0) {

                if (!$this->checkQuotaAvailability($ticketAmount[$competition->id], $competition->id, $request->offerID))
                    return redirect()->route('dashboard')->with('failed', 'Registration failed. Please try again.');

                $temp = (object) [];
                $temp->id = $competition->id;
                $temp->name = $competition->name;
                $temp->category = $competition->category;
                $temp->category_init = $competition->category_init;
                $temp->price = $offerID == 1 ? $competition->normal_price : $competition->early_price;
                $temp->count = $ticketAmount[$competition->id];

                $amount = 0;
                for ($i=0; $i < $temp->count; $i++) { 
                    $amount += $temp->price;
                }

                $temp->amount = $amount;
                $totalPrice += $amount;
                $selectedCompetitions[] = $temp;
            }
        }
        
        return view('registrations.create', [
            'selectedCompetitions' => $selectedCompetitions,
            'totalPrice' => $totalPrice,
            'offerID' => $offerID,
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
        $this->validate($request, [
            'competition_id.*.*.*' => 'required|integer',
            'name.*.*.*' => 'required|string',
            'gender.*.*.*' => 'required|string',
            'grade.*.*.*' => 'required|string',
            'address.*.*.*' => 'required|string',
            'email.*.*.*' => 'required|string',
            'whatsapp_number.*.*.*' => 'required|string',
            'line_id.*.*.*' => 'string|nullable',
            'institute_name.*.*.*' => 'required|string',
            'institute_address.*.*.*' => 'required|string',
        ]);

        $category = collect($request->form)->unique();

        // REGISTRATION REQUEST VALIDATION
        if (!$this->checkOffer($request->offerID))
            return redirect()->route('dashboard')->with('failed', 'Registration failed. Please try again.');

        for ($i=0; $i < count($category); $i++) {
            $competID = $category[$i];
            $quotaRequest = count(collect($request->name[$competID]));
            
            if (!$this->checkQuotaAvailability($quotaRequest, $competID, $request->offerID))
                return redirect()->route('dashboard')->with('failed', 'Registration failed. Please try again.');
        }

        $registration = Registration::create([
            'user_id' => auth()->user()->id,
            'offer_id' => $request->offerID,
            'payment_due' => Carbon::now()->addMinutes(30),
        ]);
        
        // LOOP SEBANYAK JUMLAH KATEGORI
        for ($i=0; $i < count($category); $i++) {
            $competID = $category[$i];

            // TOTAL FORM DALAM 1 KATEGORI
            $formCount = count(collect($request->name[$competID]));
            
            // LOOP SEBANYAK JUMLAH FORM DALAM 1 KATEGORI
            for ($j=0; $j < $formCount; $j++) {
                $registration_detail = RegistrationDetail::create([
                    'registration_id' => $registration->id,
                    'competition_id' => $competID,
                    'price' => $request->price[$i]
                ]);
            
                // TOTAL PESERTA DALAM 1 FORM
                $participantCount = count($request->name[$competID][$j]);

                // LOOP SEBANYAK JUMLAH PESERTA DALAM 1 FORM
                for ($k=0; $k < $participantCount; $k++) {
                    
                    Participant::create([
                        'name' => $request->name[$competID][$j][$k],
                        'registration_detail_id' => $registration_detail->id,
                        'gender' => $request->gender[$competID][$j][$k],
                        'grade' => $request->grade[$competID][$j][$k],
                        'address' => $request->address[$competID][$j][$k],
                        'email' => $request->email[$competID][$j][$k],
                        'whatsapp_number' => $request->whatsapp_number[$competID][$j][$k],
                        'line_id' => $request->line_id[$competID][$j][$k],
                        'institute_name' => $request->institute_name[$competID][$j][$k],
                        'institute_address' => $request->institute_address[$competID][$j][$k],
                    ]);
                }
            }
        }
        
        return redirect()->route('payments.create', $registration);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {   
        $paymentSummaries = 
            DB::table('registration_details')
                ->join('competitions', 'registration_details.competition_id', 'competitions.id')
                ->select('competitions.name', 'competitions.category', 'registration_details.price', DB::raw('count(*) as total'))
                ->where('registration_details.registration_id', $registration->id)
                ->groupBy('competitions.name', 'competitions.category', 'registration_details.price')
                ->get();
        
        $totalPayment = 0;
        foreach ($paymentSummaries as $paymentSummary) {
            $totalPayment += $paymentSummary->price * $paymentSummary->total;
        }

        return view('registrations.index', [
            'registrations' => Registration::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get(),
            'registration' => $registration,
            'registrationDetails' => RegistrationDetail::where('registration_id', $registration->id)->get(),
            'paymentSummaries' => $paymentSummaries,
            'totalPayment' => $totalPayment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->back();
    }

    private function checkOffer($offerID)
    {
        $offer = Offer::where('is_active', true)->first();

        // CHECK IF REQUEST OFFER MATCHES ON GOING OFFER
        return $offerID == $offer->id ? true : false;
    }

    private function checkQuotaAvailability($quotaRequest, $competID, $offerID)
    {   
        $competition = Competition::find($competID);
        $quotaUsed = 0;

        foreach ($competition->registrations as $registration) {
            if($registration->offer_id != $offerID)
                continue;

            if ($registration->payment || $registration->payment_due > Carbon::now())
                $quotaUsed += 1;
        }
            
        $quotaAvail = $offerID == 1 ? $competition->normal_quota - $quotaUsed : $competition->early_quota - $quotaUsed;
            
        if ($quotaRequest > $quotaAvail)
            return false;

        return true;
    }
}