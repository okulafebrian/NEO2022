<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Environment;
use App\Models\Payment;
use App\Models\Refund;
use App\Models\Registration;
use App\Models\RegistrationDetail;
use App\Models\RequestInvitation;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
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
                'isRegistrationOngoing' => $this->validateEnvironment('ENV001'),
                'isEarlyBirdOngoing' => $this->validateEnvironment('ENV002'),
            ]);

        } else {

            $competitions = Competition::withCount(['normalRegistrations', 'earlyRegistrations' => function (Builder $query) {
                                $query->where('payment_due', '>=', Carbon::now())
                                    ->orWhereHas('payment');
                            }])->get(); 
            
            return view('dashboards.admin', [
                'totalParticipant' => RegistrationDetail::whereHas('verifiedPayment')->count(),
                'unverifiedCount' => Registration::whereRelation('payment', 'is_verified', null)->count(),
                'refundCount' => Refund::where('is_verified', null)->count(),
                'submissionCount' => Submission::where('created_at', Carbon::today())->count(),
                'competitions' => $competitions,
                'environments' => Environment::all(),
                'requestCount' => RequestInvitation::where('is_sent', null)->count(),
            ]);

        }
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
