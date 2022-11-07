<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Participant
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('participant')->check()) {
            return redirect()->back()->with('error', 'Not authorized!');
        }
        
        return $next($request);
    }
}
