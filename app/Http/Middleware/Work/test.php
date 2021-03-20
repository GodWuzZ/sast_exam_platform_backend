<?php

namespace App\Http\Middleware\Work;

use Closure;
use Illuminate\Http\Request;

class test
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
          if($request->has('username')&$request->has('password'))
        {
              return response()->json([
                'ret'  => 200,
                'desc' => 'OK!',
                'data' => 'nice job'
            ], 200);
        }
    else{
        return response()->json([
            'ret'  => 403,
            'desc' => 'Not Found',
            'data' => ''
        ], 403);
        }
        }
else{
    return response()->json([
        'ret'  => 403,
        'desc' => 'Not Found',
        'data' => ''
    ], 403);
}
        return $next($request);
    
    }
}