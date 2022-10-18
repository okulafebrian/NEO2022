<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\PromotionDetail;
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

            $competitions = Competition::withCount(['registrations', 'promoRegistrations' => function (Builder $query) {
                                $query->where('payment_due', '>=', Carbon::now())
                                      ->orWhereHas('payment');
                            }])->get();                              

            return view('dashboards.user', [
                'competitions' => $competitions,
                'promotion' => Promotion::where([['start', '<=', Carbon::now()], ['end', '>=', Carbon::now()]])->first()
            ]);

        } else if(auth()->user()->role == 'ADMIN') {

            $competitions = Competition::all();
            $participantSummaries = [];

            foreach ($competitions as $competition) {
                $temp = (object) [];
                $temp->id = $competition->id;
                $temp->name = $competition->name;
                $temp->category = $competition->category;
                $temp->category_init = $competition->category_init;

                $totalParticipants = 0;

                foreach ($competition->registrations as $registration) {
                    if ($registration->payment && $registration->payment->is_verified == 1)
                        $totalParticipants += 1;
                }

                $temp->totalParticipants = $totalParticipants;
                $participantSummaries[] = $temp;
            }

            $waitingVerification = Payment::where('is_verified', 0)->count();

            return view('dashboards.admin', [
                'participantSummaries' => $participantSummaries,
                'waitingVerification' => $waitingVerification,
            ]);

        }
    }
}
