<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessControl
{
    public function handle(Request $request, Closure $next, $accessId)
    {   
        $accessData = DB::table('access_controls')->where('user_id', auth()->user()->id)->where('access_id', $accessId)->first();

        if ($accessData) {
            return $next($request);
        } else {
            return back()->with('error', 'Not authorized!');
        }
    }
}
