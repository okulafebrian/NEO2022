<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('competitions.index', [
            "competitions" => Competition::all()
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
        // $request->validate([
        //     'name' => 'required|string',
        //     'category' => 'required|string',
        //     'category_init' => 'required|string',
        //     'content' => 'nullable|string',
        //     'ebooklet' => 'nullable|string',
        //     'early_price' => 'required|integer',
        //     'early_quota' => 'required|integer',
        //     'normal_price' => 'required|integer',
        //     'normal_quota' => 'required|integer',
        //     'link_group' => 'nullable|string'
        // ]);

        
        Competition::create([
            'name' => $request->name,
            'category' => $request->category,
            'category_init' => $request->category_init,
            'content' => $request->content,
            'ebooklet' => $request->ebooklet,
            'early_price' => $request->early_price,
            'early_quota' => $request->early_quota,
            'normal_price' => $request->normal_price,
            'normal_quota' => $request->normal_quota,
            'link_group' => $request->link_group
        ]);

        return redirect('competitions');

        // $competition = new Competition;
        // $competition->name = $request->input('name');
        // $competition->category = $request->input('category');
        // $competition->category_init = $request->input('category_init');
        // $competition->content = $request->input('content');
        // $competition->ebooklet = $request->input('ebooklet');
        // $competition->early_price = $request->input('early_price');
        // $competition->early_quota = $request->input('early_quota');
        // $competition->normal_price = $request->input('normal_price');
        // $competition->normal_quota = $request->input('normal_quota');
        // $competition->link_group = $request->input('link_group');
        // $competition->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        dd($competition);
        $competition->delete();
        return redirect('competitions');
    }
}
