<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAdmin
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
      // dd(Auth::user()->role == 1);
          if (Auth::check() && Auth::user()->role == 1) {
          return $next($request);
        }
          return redirect('/home');
    }
}
