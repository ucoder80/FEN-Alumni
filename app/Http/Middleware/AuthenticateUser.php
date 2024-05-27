<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class AuthenticateUser
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
        // if (! Auth::guard('web')->check()) {
        //     return redirect()->route('frontend.login');
        // }
        // return $next($request);
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->roles_id != 0)
                return $next($request);
            else
                return redirect()->route('frontend.SignIn');
        } else {
            return redirect()->route('frontend.SignIn');
        }
    }
}
