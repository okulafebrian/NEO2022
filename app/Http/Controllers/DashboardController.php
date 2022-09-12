<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Offer;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {      
        if(auth()->user()->role == 'USER') {

            return view('dashboards.user', [
                'offer' => Offer::where('is_active', true)->first(),
                'competitions' => $this->competitionSummaries(),
            ]);

        } else if(auth()->user()->role == 'ADMIN') {

            return view('dashboards.admin', [
                'offer' => Offer::where('is_active', true)->first(),
                'competitionSummaries' => $this->competitionSummaries(),
            ]);

        }
    }

    private function competitionSummaries()
    {
        $competitions = Competition::all();
        $competitionSummaries = [];

        foreach ($competitions as $competition) {
            $temp = (object) [];
            $temp->id = $competition->id;
            $temp->name = $competition->name;
            $temp->category = $competition->category;
            $temp->early_price = $competition->early_price;
            $temp->normal_price = $competition->normal_price;

            $normalQuotaUsed = 0;
            $earlyQuotaUsed = 0;

            foreach ($competition->registrations as $registration) {
                if ($registration->payment || $registration->payment_due > Carbon::now())
                    $registration->offer_id == 1 ? $normalQuotaUsed += 1 : $earlyQuotaUsed += 1;
            }

            $temp->normal_quota_avail = $competition->normal_quota - $normalQuotaUsed;
            $temp->early_quota_avail = $competition->early_quota - $earlyQuotaUsed;
            $competitionSummaries[] = $temp;
        }

        return $competitionSummaries;
    }
}
