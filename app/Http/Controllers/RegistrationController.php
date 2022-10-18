<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\GradeLevel;
use App\Models\Offer;
use App\Models\Participant;
use App\Models\Promotion;
use App\Models\PromotionDetail;
use App\Models\Registration;
use App\Models\RegistrationDetail;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $ticketQty = $request->ticket_qty;
        $hasPromo = $request->has_promo;
        $price = $request->price;
        
        $competitions = Competition::withCount(['registrations', 'promoRegistrations' => function (Builder $query) {
                            $query->where('payment_due', '>=', Carbon::now())
                                  ->orWhereHas('payment');
                        }])->get();   
           
        $totalPrice = 0;

        foreach ($competitions as $competition) {
            // VALIDATE TICKET
            if($this->validateTicket($competition, $hasPromo[$competition->id], $ticketQty[$competition->id]) == false)
                return redirect()->route('dashboard')->with('failed', 'Tickets are sold out!');

            $totalPrice += $price[$competition->id] * $ticketQty[$competition->id];
        }
        
        return view('registrations.create', [
            'competitions' => $competitions,
            'price' => $price,
            'ticketQty' => $ticketQty,
            'totalPrice' => $totalPrice,
            'hasPromo' => $hasPromo,
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
            'id.*' => 'integer',
            'promo_id.*' => 'integer|nullable',
            'total_price' => 'integer',
            'name.*.*.*' => 'required|string',
            'email.*.*.*' => 'required|string',
            'gender.*.*.*' => 'required|string',
            'address.*.*.*' => 'required|string',
            'phone_num.*.*.*' => 'required|string',
            'line_id.*.*.*' => 'required|string',
            'level.*.*.*' => 'required|string',
            'institution.*.*.*' => 'required|string',
        ]);
        
        $registration = DB::transaction(function () use($request) {

            $registration = Registration::create([
                'user_id' => auth()->user()->id,
                'payment_due' => Carbon::now()->addHours(5),
            ]);
                        
            for ($i=0; $i < count($request->id); $i++) { 
                $id = $request->id[$i];

                // TOTAL TICKET IN 1 COMPETITION
                $totalTicket = count(($request->name[$id]));
                
                $competition = Competition::withCount(['registrations', 'promoRegistrations' => function (Builder $query) {
                                    $query->where('payment_due', '>=', Carbon::now())
                                          ->orWhereHas('payment');
                                }])->find($id);

                // VALIDATE TICKET
                if($this->validateTicket($competition, $request->has_promo[$i], $totalTicket) == false)
                    return redirect()->route('dashboard')->with('failed', 'Tickets are sold out!');

                for ($j=0; $j < $totalTicket; $j++) {
                    $registration_detail = RegistrationDetail::create([
                        'registration_id' => $registration->id,
                        'competition_id' => $id,
                        'price' => $request->price[$i],
                        'has_promo' => $request->has_promo[$i] ? 1 : 0
                    ]);

                    // TOTAL PARTICIPANT IN 1 TEAM
                    $participantCount = count($request->name[$id][$j]);

                    for ($k=0; $k < $participantCount; $k++) {                        
                        Participant::create([
                            'name' => $request->name[$id][$j][$k],
                            'registration_detail_id' => $registration_detail->id,
                            'gender' => $request->gender[$id][$j][$k],
                            'level' => $request->level[$id][$j][$k],
                            'address' => $request->address[$id][$j][$k],
                            'email' => $request->email[$id][$j][$k],
                            'phone_num' => $request->phone_num[$id][$j][$k],
                            'line_id' => $request->line_id[$id][$j][$k],
                            'institution' => $request->institution[$id][$j][$k],
                        ]);
                    }
                }
            }
            
            return $registration;
        });
       
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        return view('registrations.edit', [
            'registration' => $registration,
            'gradeLevels' => GradeLevel::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Iregistrationlluminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $this->validate($request, [
            'name.*' => 'required|string',
            'email.*' => 'required|string',
            'gender.*' => 'required|string',
            'address.*' => 'required|string',
            'phone_num.*' => 'required|string',
            'line_id.*' => 'required|string',
            'level.*' => 'required|string',
            'institution.*' => 'required|string',
        ]);
        
        DB::transaction(function () use($request) {
            foreach ($request->id as $id) {
                $participant = Participant::find($id);

                $participant->update([
                    'name' => $request->name[$id],
                    'gender' => $request->gender[$id],
                    'level' => $request->level[$id],
                    'address' => $request->address[$id],
                    'email' => $request->email[$id],
                    'phone_num' => $request->phone_num[$id],
                    'line_id' => $request->line_id[$id],
                    'institution' => $request->institution[$id],
                ]);
            }
        });

        return back()->with('success', 'Data updated successfully.');
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

    public function manage()
    {   
        $registrations = Registration::all();
        $paymentSummaries = [];
        $totalPayment = [];
        
        foreach ($registrations as $key => $registration) {
            $tempPaymentSummaries = 
            DB::table('registration_details')
                ->join('competitions', 'registration_details.competition_id', 'competitions.id')
                ->select('competitions.name', 'competitions.category', 'registration_details.price', DB::raw('count(*) as total'))
                ->where('registration_details.registration_id', $registration->id)
                ->groupBy('competitions.name', 'competitions.category', 'registration_details.price')
                ->get();

            $tempTotalPayment = 0;
            
            foreach ($tempPaymentSummaries as $tempPaymentSummary) {
                $tempTotalPayment += $tempPaymentSummary->price * $tempPaymentSummary->total;
            }

            $paymentSummaries[$key] = $tempPaymentSummaries;
            $totalPayment[$key] = $tempTotalPayment;
        }
        
        return view('registrations.manage', [
            'unverifiedRegistrations' => Registration::whereRelation('payment', 'is_verified', 0)->get(),
            'pendingPayments' => Registration::doesntHave('payment')->where('payment_due', '>', Carbon::now())->orderBy('created_at', 'DESC')->get(),
            'verifiedRegistrations' => Registration::whereRelation('payment', 'is_verified', 1)->get(),
            'expiredRegistrations' => Registration::doesntHave('payment')->where('payment_due', '<', Carbon::now())->get(),
            // 'paymentSummaries' => $paymentSummaries,
            'totalPayment' => $totalPayment,
        ]);
    }

    function validateTicket($competition, $hasPromo, $totalTicket)
    {   
        if ($hasPromo) {
            $promo = Promotion::where([['start', '<=', Carbon::now()], ['end', '>=', Carbon::now()]])->first();
            
            // CHECK IF PROMO VALID OR NOT
            if (!$promo) return false;
    
            // CHECK TICKET AVAILABILITY                            
            $remainingQuota = $competition->promo_quota - $competition->promo_registrations_count;

            if($totalTicket > $remainingQuota) return false;
        } else {
            // CHECK TICKET AVAILABILITY
            $remainingQuota = $competition->quota - $competition->registrations_count;

            if($totalTicket > $remainingQuota) return false;
        }
        return true;
    }

}
