<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $competitions = Competition::withCount('promoRegistrations')->get();
        
        return view('promotions.index', [
            'promotion' => Promotion::first(),
            'competitions' => $competitions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create', [
            'competitions' => Competition::all(),
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
        DB::transaction(function () use($request) {
            Promotion::create([
                'name' => $request->name,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            $competitions = Competition::all();

            foreach ($competitions as $competition) {
                $competition->update([
                    'promo_price' => str_replace(".", "", $request->promo_price[$competition->id]) ,
                    'promo_quota' => $request->promo_quota[$competition->id]
                ]);
            }
        });

        return redirect()->route('promotions.index')->with('success', 'Promotion successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {   
        return view('promotions.edit', [
            'promotion' => $promotion,
            'competitions' => Competition::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {   
        DB::transaction(function () use($request, $promotion) {
            $promotion->update([
                'name' => $request->name,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            $competitions = Competition::all();

            foreach ($competitions as $competition) {
                $competition->update([
                    'promo_price' => str_replace(".", "", $request->promo_price[$competition->id]) ,
                    'promo_quota' => $request->promo_quota[$competition->id]
                ]);
            }
        });

        return back()->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }

    public function terminate(Promotion $promotion)
    {
        $promotion->update([
            'end' => Carbon::now(),
        ]);

        return back()->with('success', 'Promotion has ended.');
    }
}
