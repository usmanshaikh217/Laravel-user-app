<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->role_as == '1') // 1 for Admin
            {
                return $next($request);
            }
            elseif(Auth::user()->role_as == '0') //  0 for User
            {
                return redirect('/user/dashboard');
            }
            elseif(Auth::user()->role_as == '2') //  2 for HR
            {
                return redirect('/hr/dashboard');
            }
            else
            {
                return redirect('/home')->with('status', 'Access Denied...!!!');
            }
        }
        else
        {
            return redirect('/home')->with('status', 'Please Login First');
        }
    }
}
