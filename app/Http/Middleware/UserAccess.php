<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if (auth()->user()->type == $userType) {
            return $next($request);
        }

        if (auth()->user() && $userType == 'admin') {
            return redirect()->route('admin.index');
        }

        if (auth()->user() && $userType == 'user') {
            return redirect()->route('home.index');
        }
        /* return response()->view('errors.check-permission'); */
    }
}
