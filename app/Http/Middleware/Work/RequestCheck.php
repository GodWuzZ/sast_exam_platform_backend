<?php

namespace App\Http\Middleware\Work;

use Closure;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class RequestCheck
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
            if($request->input('name')==null or $request->input('password')==null){
            return response()->json([
                'ret'  => 403,
                'desc' => 'invalide username or password',
                'data' => 'username and password can not be null'
            ],403);
            }
            else{
            return response()->json([
                'ret'  => 200,
                'desc' => 'OK!',
                'data' => 'success'
            ], 200);
            }
        }
        else{
            return response()->json([
                'ret'  => 404,
                'desc' => 'NOT FOUND',
                'data' => 'wrong request way'
            ], 404);
            
        }
        return $next($request);
    }
}
