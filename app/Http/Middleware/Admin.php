<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {

            $userType = Auth::user()->usertype;
            if ($userType === 'admin' || $userType === 'subadmin' || $userType === 'superadmin') {
                return $next($request);
            }
        }

        return abort(403);
    }
}