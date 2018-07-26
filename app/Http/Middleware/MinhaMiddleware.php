<?php

namespace App\Http\Middleware;

use Closure;

class MinhaMiddleware
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
        $input = $request->all();
        foreach ($input as $key => $value) {
           $input[$key]= htmlspecialchars($value, ENT_QUOTES);
        }
        $request->merge($input);
        return $next($request);
    }
}
