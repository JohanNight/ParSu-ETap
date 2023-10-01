<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CodeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request === null) {
            // Code is invalid; you can return a response, redirect, or abort here
            return redirect()->route('clientSecurity')->with('message', 'Invalid code');
        }
        return $next($request);
    }
}
