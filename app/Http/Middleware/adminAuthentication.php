<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminAuthentication
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
        if(auth()->user() && auth()->user()->userType == 2){
            return $next($request);
        }
        print_r( auth()->user()->userType);
        // return redirect('/login');
    }
}
