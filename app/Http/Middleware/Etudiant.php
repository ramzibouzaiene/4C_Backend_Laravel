<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Etudiant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 4) {
            return redirect()->route('etudiant');
        }
       
        if (Auth::user()->role == 1) {
            return $next($request);
        } else {
            return back(); 
        };
    }
    }
}
