<?php

namespace App\Http\Controllers;

use App\Imports\FAQsImport;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FAQController extends Controller
{
    
    public function index()
    {
        return view('faqs.index', [
            'faqs' => FAQ::all()
        ]);
    }

    public function manage()
    {
        return view('faqs.manage', [
            'generalFaqs' => FAQ::where('category', 'general')->get(),
            'accomodationFaqs' => FAQ::where('category', 'accomodation')->get(),
            'competitionFaqs' => FAQ::where('category', 'competition')->get(),
            'technicalFaqs' => FAQ::where('category', 'technical')->get(),
        ]);
    }

    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        FAQ::create([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('faqs.manage')->with('success', 'Data sucessfully added');
    }

    public function show(FAQ $faq)
    {
        //
    }

    public function edit(FAQ $faq)
    {
        return view('faqs.edit', [
            'faq' => $faq
        ]);
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'category' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $faq->update([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('faqs.manage')->with('success', 'Data successfully updated!');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.manage')->with('success', 'Data successfully deleted!');
    }

    public function import(Request $request)
    {   
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        if ($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $proofNameToStore = 'FAQ.' . $extension;
            $request->file('file')->storeAs('public/faqs', $proofNameToStore);
        }
		
		Excel::import(new FAQsImport, public_path('/storage/faqs/' . $proofNameToStore));

        return redirect()->route('faqs.manage')->with('success', 'Data successfully added!');
    }
}
