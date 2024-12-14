<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isClubAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()){
            return redirect()->route('login');
        }
        if(Auth::check())
            if(Auth::user()->isClubAdmin == true){
                return $next($request);
            }

        return redirect()->back()->with('unauthorised', 'You are
          unauthorised to access this page');

    }
}
