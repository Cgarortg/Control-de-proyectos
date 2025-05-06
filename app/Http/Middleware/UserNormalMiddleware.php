<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserNormalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rol = auth()->user()->tipo ?? 'SINUSER';
        if($rol == 'NORMAL'){
            return $next($request);
        }
        return redirect(config('global.'.$rol));
    }
}
