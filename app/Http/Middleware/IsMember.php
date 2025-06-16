<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('member.loginForm');
        }

        if (Auth::user()->system_admin !== 'Member') {
            Auth::logout();
            return redirect()->route('member.loginForm')
                ->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
