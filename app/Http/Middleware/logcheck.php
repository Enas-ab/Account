<?php

namespace App\Http\Middleware;

use Closure;

class logcheck
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
        //print_r(\Session::get('logData'));
        if(empty(\Session::get('logData')))
        {
          return  redirect('/create');
        }
        return $next($request);
    }
}
