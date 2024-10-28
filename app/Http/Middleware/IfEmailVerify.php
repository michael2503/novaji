<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IfEmailVerify
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user() && Auth::user()->email_verify == 1){
            return $next($request);
        } else {
            return redirect(RouteServiceProvider::REGISTERHOME);
        }
    }
}
