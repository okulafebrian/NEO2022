<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use App\Models\Registration;
use App\Models\Slot;
use App\Models\SlotDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function i()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        $tickets = collect($request->ticketAmount);
        $prices = collect($request->price);
        $competitions = Competition::all();

        foreach ($competitions as $competition) {
            if($competition->early_quota < $tickets[$competition->id]){
                return back();
            }
        }
        
        return view('registrations.create', [
            'tickets' => $tickets,
            'prices' => $prices,
            'competitions' => $competitions,
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
            'form_id.*.*.*' => 'required|integer',
            'prices.*.*.*' => 'required|integer',
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
            'payment_due' => Carbon::now()->addHours(2),
            'is_expired' => false
        ]);
        
        $compet_id = $request->competition_id;
        $unique_compet_id = collect($compet_id)->unique()->values();
                
        for ($i=0; $i < count($unique_compet_id); $i++) { 
            $form_id = collect($request->name[$unique_compet_id[$i]]);

            for ($j=0; $j < count($form_id); $j++) { 
                $form_detail_id = collect($request->name[$unique_compet_id[$i]][$j]);
           
                $slot = Slot::create([
                    'registration_id' => $registration->id,
                    'competition_id' => $unique_compet_id[$i],
                    'price' => 200,
                ]);
                
                for ($k=0; $k < count($form_detail_id); $k++) {
                    $participant = Participant::create([
                        'name' => $request->name[$unique_compet_id[$i]][$j][$k],
                        'gender' => $request->gender[$unique_compet_id[$i]][$j][$k],
                        'grade' => $request->grade[$unique_compet_id[$i]][$j][$k],
                        'address' => $request->address[$unique_compet_id[$i]][$j][$k],
                        'email' => $request->email[$unique_compet_id[$i]][$j][$k],
                        'whatsapp_number' => $request->whatsapp_number[$unique_compet_id[$i]][$j][$k],
                        'line_id' => $request->line_id[$unique_compet_id[$i]][$j][$k],
                        'institute_name' => $request->institute_name[$unique_compet_id[$i]][$j][$k],
                        'institute_address' => $request->institute_address[$unique_compet_id[$i]][$j][$k],
                    ]);

                    SlotDetail::create([
                        'slot_id' => $slot->id,
                        'participant_id' => $participant->id
                    ]);
                }
            }
        }

        return redirect()->route('dashboard');
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
