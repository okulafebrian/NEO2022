<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {  
        $currentOffer = Offer::where('is_active', true)->first();

        return view('dashboards.user', [
            'competitions' => Competition::all(),
            'currentOffer' => $currentOffer
        ]);
    }
}
