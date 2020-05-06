<?php

namespace App\Http\Middleware;

use Closure;

class MustChangePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('must_change_pwd'))
        {
            return redirect('/edit-password');
        }
        return $next($request);
    }
}
