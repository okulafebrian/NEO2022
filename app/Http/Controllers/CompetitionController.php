<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompetitionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin']);
        $this->middleware('access.control:5');
    }

    public function index()
    {   
        $competitions = Competition::withCount(['normalRegistrations', 'earlyRegistrations' => function (Builder $query) {
                            $query->where('payment_due', '>=', Carbon::now())
                                  ->orWhereHas('payment');
                        }])->get();   
        
        return view('competitions.index', [
            'competitions' => $competitions,
        ]);
    }

    public function create()
    {
        return view('competitions.create');
    }

    public function store(Request $request)
    {   
        $this->validateRequest($request);

        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '_' . $request->input('category') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/competitions', $proofNameToStore);
        }

        Competition::create([
            'name' => $request->name,
            'category' => $request->category,
            'category_init' => $this->getCategoryInitial($request->category),
            'normal_price' => str_replace(".", "", $request->normal_price),
            'total_quota' => $request->total_quota,
            'early_price' => str_replace(".", "", $request->early_price),
            'early_quota' => $request->early_quota,
            'logo' => $proofNameToStore,
            'link_group' => $request->link_group,
            'ebooklet' => $request->ebooklet,
            'description' => $request->description,
            'rules' => $request->rules,
            'is_active' => 1,
        ]);

        return redirect()->route('competitions.index')->with('success', 'Data sucessfully added');
    }

    public function show(Competition $competition)
    {
        return view('competitions.show', [
            'competition' => $competition
        ]);
    }

    public function edit(Competition $competition)
    {
        return view('competitions.edit', [
            'competition' => $competition
        ]);
    }

    public function update(Request $request, Competition $competition)
    {   
        $this->validateRequest($request);
        
        if ($request->hasFile('logo')) {
            if ($competition->logo != NULL)
                Storage::delete('public/images/competitions/' . $competition->logo);
            
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '_' . $request->input('category') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/competitions', $proofNameToStore);
        } else {
            $proofNameToStore = $competition->logo;
        }

        $competition->update([
            'name' => $request->name,
            'category' => $request->category,
            'category_init' => $this->getCategoryInitial($request->category),
            'normal_price' => str_replace(".", "", $request->normal_price),
            'total_quota' => $request->total_quota,
            'early_price' => str_replace(".", "", $request->early_price),
            'early_quota' => $request->early_quota,
            'logo' => $proofNameToStore ,
            'link_group' => $request->link_group,
            'ebooklet' => $request->ebooklet,
            'description' => $request->description,
            'rules' => $request->rules,
        ]);

        return redirect()->route('competitions.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('competitions.index')->with('success', 'Data successfully deleted!');
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'logo' => 'image|dimensions:min_width=300,min_height=300|mimes:jpg,png,jpeg',
            'name'=> 'required|string',
            'category'=> 'required|string',
            'normal_price'=> 'required|string',
            'total_quota'=> 'required|integer',
            'early_price'=> 'string|nullable',
            'early_quota'=> 'integer|nullable',
            'ebooklet'=> 'string|nullable',
            'link_group'=> 'string|nullable',
            'content'=> 'string|nullable',
        ]);
    }

    protected function getCategoryInitial($category)
    {
        $words = explode(" ", $category);
        $category_init = null;

        foreach ($words as $char) {
            $category_init .= mb_substr($char, 0, 1);
        }

        return $category_init;
    }
}
