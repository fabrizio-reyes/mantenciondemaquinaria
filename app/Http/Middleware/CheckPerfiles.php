<?php

namespace App\Http\Middleware;

use Closure;

class CheckPerfiles
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
        $perfiles = array_slice(func_get_args(), 2);

       
        if (auth()->user()->hasPerfiles($perfiles)) {
             return $next($request);
        }
        return redirect()->route('solicitudes.index');

        

       
    }


}
