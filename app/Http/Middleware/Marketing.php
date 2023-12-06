<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Marketing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('marketing')->check() && Auth::guard('marketing')->user()->marketer->status) {
            return $next($request);
        }
        Auth::guard("marketing")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('marketing.login')->with('error', 'Your marketing account is deative.');
    }
}
