<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkpass
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
        $msg ='you cant hack me hahaha';
        if($request->api_password != env("API_PASS" , "KtG6C2L1XctMabX")){
            return response()->json($msg);
        }
        return $next($request);
    }
}
