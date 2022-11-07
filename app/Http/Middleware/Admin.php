<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== 'ADMIN') {
            return redirect()->back()->with('error', 'Not authorized!');
        }
        return $next($request);
    }
}
