<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function show()
    {
        $districts = District::where('province_id', request()->input('province_id'))->pluck('name','id');
        
        return response()->json($districts);
    }
}
