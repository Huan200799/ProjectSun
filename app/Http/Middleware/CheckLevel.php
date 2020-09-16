<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckLevel
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
        if(Auth::user())
        {
            if(Auth::user()->level == 1)
            {
                return redirect()->route('users.index');
            }
            if(Auth::user()->level == 2)
            {
                return redirect()->route('homepage');
            }
        }
    }
}
