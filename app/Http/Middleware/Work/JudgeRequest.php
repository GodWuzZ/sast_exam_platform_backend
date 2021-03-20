<?php

namespace App\Http\Middleware\Work;

use Closure;
use Illuminate\Http\Request;

class JudgeRequest
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
        if($request->method()=='POST')
        {
            if($request->input('username')==null or $request->input('password')==null)
            {
                return response()->json([
                    'ret'  => 403,
                    'desc' => 'username or password does not exist',
                    'data' => 'try again'
                ],403);
            }else{
                return response()->json([
                    'ret'  => 200,
                    'desc' => 'OK!',
                    'data' => 'success!'
                ],200);
            }
        }else{
            return response()->json([
                'ret'  => 404,
                'desc' => 'NOT FOUND',
                'data' => 'Request error!'
            ],404 );
        }
        return $next($request);
    }
}
