<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Competition;
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
        $partic_details = 
            DB::table('participants')
                ->join('registration_details', 'participants.registration_detail_id', 'registration_details.id')
                ->join('competitions', 'registration_details.competition_id', 'competitions.id')
                ->select('registration_details.competition_id', 'participants.id', 'participants.name', 'participants.gender', 'participants.grade', 'participants.email', 'participants.line_id', 'participants.whatsapp_number', 'participants.registration_detail_id')
                ->get();
            
            return view('admin.index', [
                "competitions" => Competition::all(),
                "partic_details" => $partic_details
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $participant = Participant::find($id);
        $participant->name = $request->input('name');
        $participant->gender = $request->input('gender');
        $participant->grade = $request->input('grade');
        $participant->address = $request->input('address');
        $participant->email = $request->input('email');
        $participant->line_id = $request->input('line_id');
        $participant->whatsapp_number = $request->input('whatsapp_number');
        $participant->institute_name = $request->input('institute_name');
        $participant->institute_address = $request->input('institute_address');
        $participant->update();
        session()->flash('flashModal');

        return redirect('participants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect('participants');
    }
}
