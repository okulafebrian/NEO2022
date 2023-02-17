<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{

    public function show()
    {
        $faculties = Faculty::where('region', 'like', request()->input('region'))->pluck('name','id');
        
        return response()->json($faculties);
    }
}
