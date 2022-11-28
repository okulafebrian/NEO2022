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
            'generalFaqs' => FAQ::where('category', 'general')->get(),
            'competitionFaqs' => FAQ::where('category', 'competition')->get()
        ]);
    }

    public function manage()
    {
        return view('faqs.manage', [
            'generalFaqs' => FAQ::where('category', 'general')->get(),
            'competitionFaqs' => FAQ::where('category', 'competition')->get(),
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
            'sub_category' => $request->has('sub_category') ? $request->sub_category : null,
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
            'sub_category' => $request->has('sub_category') ? $request->sub_category : null,
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
}
