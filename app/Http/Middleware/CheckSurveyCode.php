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
        $temporaryCode = ClientCode::where('code', $request->srvy_keycode)->get();

        if ($request->input('srvy_keycode') !==  $temporaryCode) {
            return redirect('clientSecurity');
        }
        // Code is valid, proceed to the next middleware or route
        return $next($request);
    }
}
