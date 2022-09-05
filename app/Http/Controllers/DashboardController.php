<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {  

        return view('dashboards.user', [
            'currentOffer' => Offer::where('is_active', true)->first(),
            'competitions' => Competition::all(),
        ]);
    }
}
