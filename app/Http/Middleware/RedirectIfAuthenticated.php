<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Redirect paths of guards.
     *
     * @var array
     */
    private $guard_homepage = [
        'web' => 'home',
        'admin' => 'backend',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // If guard is null, auto set guard to the default defined in auth config
        if (! $guard) {
            $guard = config('auth.defaults.guard');
        }

        if (Auth::guard($guard)->check()) {
            return redirect($this->guard_homepage[$guard]);
        }

        return $next($request);
    }
}
