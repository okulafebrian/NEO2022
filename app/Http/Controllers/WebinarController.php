<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index()
    {
        return view('webinars.index', [
            'isWebinarOngoing' => $this->validateEnvironment('ENV011')
        ]);
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
