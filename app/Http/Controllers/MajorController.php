<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
   
    public function show()
    {
        $majors = Major::where('faculty_id', request()->input('faculty_id'))->pluck('name','id');
        
        return response()->json($majors);
    }
}
