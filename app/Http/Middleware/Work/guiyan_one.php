<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class guiyan_one
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
        if($request->method()=='POST'){
            return response()->json([
                'ret'  => 200,
                'desc' => 'OK!',
                'data' => 'nice job'
            ], 200);
        }else return $next($request);
        if($request->has(['username', 'password'])) {
            return response()->json([
                'ret'  => 200,
                'desc' => 'OK!',
                'data' => 'good job'
            ], 200);
        }else dd(403);


        
    }
}
