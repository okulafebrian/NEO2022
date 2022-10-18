<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Carbon\Carbon;
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
            'competitions' => Competition::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'logo' => 'required|image|max:1999|mimes:jpg,png,jpeg',
            'name'=> 'required|string',
            'category'=> 'required|string',
            'price'=> 'required|string',
            'quota'=> 'required|integer',
            'ebooklet'=> 'string|nullable',
            'link_group'=> 'string|nullable',
            'content'=> 'string|nullable',
        ]);

        // GET CATEGORY INITIAL
        $words = explode(" ", $request->category);
        $category_init = "";

        foreach ($words as $char) {
            $category_init .= mb_substr($char, 0, 1);
        }

        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '_' . $request->input('category') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/logos', $proofNameToStore);
        }

        Competition::create([
            'name' => $request->name,
            'category' => $request->category,
            'category_init' => $category_init,
            'price' => str_replace(".", "", $request->price),
            'quota' => $request->quota,
            'logo' => $proofNameToStore,
            'link_group' => $request->link_group,
            'ebooklet' => $request->ebooklet,
            'content' => $request->content,
            'is_active' => 1,
        ]);

        return redirect()->route('competitions.index')->with('success', 'Competition sucessfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        return view('competitions.show', [
            'competition' => $competition
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        return view('competitions.edit', [
            'competition' => $competition
        ]);
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
        $request->validate([
            'logo' => 'required|image|dimensions:min_width=300, min_height=300, max_width=700, max_height=700|mimes:jpg,png,jpeg',
            'name'=> 'required|string',
            'category'=> 'required|string',
            'price'=> 'required|string',
            'quota'=> 'required|integer',
            'ebooklet'=> 'string|nullable',
            'link_group'=> 'string|nullable',
            'content'=> 'string|nullable',
        ]);

        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '_' . $request->input('category') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/logos', $proofNameToStore);
        }

        // GET CATEGORY INITIAL
        $words = explode(" ", $request->category);
        $category_init = "";

        foreach ($words as $char) {
            $category_init .= mb_substr($char, 0, 1);
        }

        $competition->update([
            'name' => $request->name,
            'category' => $request->category,
            'category_init' => $category_init,
            'price' => str_replace(".", "", $request->price),
            'quota' => $request->quota,
            'logo' => $proofNameToStore,
            'link_group' => $request->link_group,
            'ebooklet' => $request->ebooklet,
            'content' => $request->content,
            'is_active' => 1,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        //
    }
}
