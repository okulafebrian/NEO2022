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
        $currentOffer = Offer::where('is_active', true)->first();

        $competTicketAmount = $request->competTicketAmount;
        $competitions = Competition::all();
        $selectedCompetitions = [];
        $totalPrice = null;

        foreach ($competitions as $competition) {
            if ($competTicketAmount[$competition->id] > 0) {
                $temp = (object) [];
                $temp->id = $competition->id;
                $temp->name = $competition->name;
                $temp->category = $competition->category;
                $temp->price = $currentOffer->type == 'Normal' ? $competition->normal_price : $competition->early_price;
                $temp->count = $competTicketAmount[$competition->id];

                $amount = null;
                for ($i=0; $i < $temp->count; $i++) { 
                    $amount += $currentOffer->type == 'Normal' ? $competition->normal_price : $competition->early_price;
                }
                $temp->amount = $amount;

                $totalPrice += $amount;

                $selectedCompetitions[] = $temp;
            }
        }
        
        return view('registrations.create', [
            'selectedCompetitions' => $selectedCompetitions,
            'totalPrice' => $totalPrice,
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

        $registration = Registration::create([
            'user_id' => auth()->user()->id,
            'payment_due' => Carbon::now()->addHours(3),
            'is_expired' => false
        ]);
        
        $unique_compet_id = collect($request->competition_id)->unique()->values();
                
        for ($i=0; $i < count($unique_compet_id); $i++) { 
            $form_id = collect($request->name[$unique_compet_id[$i]]);

            for ($j=0; $j < count($form_id); $j++) { 
                $form_detail_id = collect($request->name[$unique_compet_id[$i]][$j]);
           
                $registration_detail = RegistrationDetail::create([
                    'registration_id' => $registration->id,
                    'competition_id' => $unique_compet_id[$i],
                    'price' => $request->price[$i]
                ]);
                
                for ($k=0; $k < count($form_detail_id); $k++) {
                    Participant::create([
                        'name' => $request->name[$unique_compet_id[$i]][$j][$k],
                        'registration_detail_id' => $registration_detail->id,
                        'gender' => $request->gender[$unique_compet_id[$i]][$j][$k],
                        'grade' => $request->grade[$unique_compet_id[$i]][$j][$k],
                        'address' => $request->address[$unique_compet_id[$i]][$j][$k],
                        'email' => $request->email[$unique_compet_id[$i]][$j][$k],
                        'whatsapp_number' => $request->whatsapp_number[$unique_compet_id[$i]][$j][$k],
                        'line_id' => $request->line_id[$unique_compet_id[$i]][$j][$k],
                        'institute_name' => $request->institute_name[$unique_compet_id[$i]][$j][$k],
                        'institute_address' => $request->institute_address[$unique_compet_id[$i]][$j][$k],
                    ]);
                }
            }
        }

        return redirect()->route('payments.create');
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
        //
    }
}
