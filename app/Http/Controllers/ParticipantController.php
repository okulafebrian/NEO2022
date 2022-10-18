<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Participant;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $competitions = Competition::all(); 

        $registrations = Registration::whereRelation('payment', 'is_verified', 1)->get();

        $debateParticipants = [];
        $newscastingParticipants = [];
        $sswParticipants = [];
        $speechJHSParticipants = [];
        $speechOCParticipants = [];

        foreach($registrations as $registration) {
            foreach($registration->registrationDetails as $key => $registrationDetail) {
                foreach ($registrationDetail->participants as $participant) {
                    $temp = (object) [];
                    $temp->id = $participant->id;
                    $temp->name = $participant->name;
                    $temp->gender = $participant->gender;
                    $temp->grade = $participant->grade;
                    $temp->address = $participant->address;
                    $temp->email = $participant->email;
                    $temp->whatsapp_number = $participant->whatsapp_number;
                    $temp->line_id = $participant->line_id;
                    $temp->institute_name = $participant->institute_name;
                    $temp->institute_address = $participant->institute_address;

                    switch ($registrationDetail->competition->id) {
                        case 1:
                            $debateParticipants[] = $temp;
                            break;
                        case 2:
                            $newscastingParticipants[] = $temp;
                        break;
                        case 3:
                            $sswParticipants[] = $temp;
                        break;
                        case 4:
                            $speechJHSParticipants[] = $temp;
                        break;
                        case 5:
                            $speechOCParticipants[] = $temp;
                        break;
                    }
                }
            }
        }
        
        return view('participants.index', [
            'competitions' => $competitions,
            'debateParticipants' => $debateParticipants,
            'newscastingParticipants' => $newscastingParticipants,
            'sswParticipants' => $sswParticipants,
            'speechJHSParticipants' => $speechJHSParticipants,
            'speechOCParticipants' => $speechOCParticipants,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        return view('participants.edit', [
            'participant' => $participant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'grade' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
            'whatsapp_number' => 'required|string',
            'line_id' => 'string|nullable',
            'institute_name' => 'required|string',
            'institute_address' => 'required|string',
        ]);

        $participant->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'address' => $request->address,
            'email' => $request->email,
            'whatsapp_number' => $request->whatsapp_number,
            'line_id' => $request->line_id,
            'institute_name' => $request->institute_name,
            'institute_address' => $request->institute_address,
        ]);

        return redirect()->route('participants.index')->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
