<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PresenterMiddleware
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
        if (request()->session()->get('user.id_role_user') == 2) {
            return $next($request);
        }
        return redirect('/illegal')->with('error', 'You are not authorized to access this page');
    }
}