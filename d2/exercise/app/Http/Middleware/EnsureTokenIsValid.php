<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

$RequiredToken="secret_token";

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        global $RequiredToken;
        print_r($RequiredToken);
        if ($request->input('token')!="secret_token"){
            return response()->json([
                "message" => "Sorry, authentication failed."
            ], 404);
//            return redirect("/");
        }
        return $next($request);
    }
}
