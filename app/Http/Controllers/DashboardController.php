<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Environment;
use App\Models\Payment;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {      
        if(auth()->user()->role == 'USER') {

            $competitions = Competition::withCount(['registrations', 'earlyRegistrations' => function (Builder $query) {
                                $query->where('payment_due', '>=', Carbon::now())
                                      ->orWhereHas('payment');
                            }])->get();                              
            
            return view('dashboards.user', [
                'competitions' => $competitions,
                'isRegistrationOngoing' => $this->validateEnvironment('REGISTRATION'),
                'isEarlyBirdOngoing' => $this->validateEnvironment('EARLY BIRD'),
            ]);

        } else if(auth()->user()->role == 'ADMIN') {

            $competitions = Competition::all();
        
            return view('dashboards.admin', [
                'unverifiedRegistrations' => Registration::whereRelation('payment', 'is_verified', null)->count(),
                'competitions' => Competition::all(),
            ]);

        }
    }

    protected function validateEnvironment($name)
    {
        $environment = Environment::where('name', $name)->first();
        $start_time = strtotime($environment->start_time);
        $end_time = strtotime($environment->end_time);
        
        return (time() >= $start_time  && time() <= $end_time) ? true : false;
    }
}
