<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Competition;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use App\Models\Round;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('index');
        $this->middleware(['participant'])->except('index');
        $this->middleware(['admin'])->only('index');
        // $this->middleware('access.control:10')->except('index');
    }
    
    public function index()
    {
        $rounds = Round::all();
        $competitions = Competition::all();
        $qualifications = [];

        foreach ($rounds as $round) {
            foreach ($competitions as $competition) {
                $temp = Qualification::where('round_id', $round->id)
                        ->whereRelation('registrationDetail', 'competition_id', $competition->id)->get();

                $qualifications[$round->id][$competition->id] =  $temp;
            }
        }
        
        return view('attendances.index', [
            'rounds' => $rounds,
            'competitions' => $competitions,
            'qualifications' => $qualifications,
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

    public function store(Request $request)
    {   
        $request->validate([
            'qualification_id' => 'required|integer'
        ]);

        $attendance = Attendance::where('qualification_id', $request->qualification_id)->first();

        if (!$attendance) {
            Attendance::create([
                'qualification_id' => $request->qualification_id
            ]);
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
