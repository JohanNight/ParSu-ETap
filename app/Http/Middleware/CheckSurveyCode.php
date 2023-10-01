<?php

namespace App\Http\Middleware;

use App\Models\clientCode;
use Illuminate\Http\Request;
use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


class CheckSurveyCode
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): $request (\Symfony\Component\HttpFoundation\Response)  $next
     *  @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Log the incoming request data
        Log::info('Incoming Request', [
            'uri' => $request->getRequestUri(),
            'method' => $request->getMethod(),
            'headers' => $request->header(),
            'query' => $request->query(),
            'data' => $request->all(),
        ]);
        $code = $request->input('srvy_keycode');
        // Check if a code exists in the database
        $temporaryCode = clientCode::where('code', $code)->first();

        if (!$temporaryCode) {
            // Code is invalid; you can return a response, redirect, or abort here
            return redirect()->route('clientSecurity')->with('message', 'Invalid code');
        }

        // Code is valid, proceed to the next middleware or route
        return $next($request);
    }
}
