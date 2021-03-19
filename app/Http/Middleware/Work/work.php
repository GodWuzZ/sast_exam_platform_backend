<?php

namespace App\Http\Middleware\Work;

use Closure;
use Illuminate\Http\Request;

class work
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
        if($request->method()=='GET'){
            return redirect('/');
        }else{
            return response()->json([
                'ret'  => 200,
                'desc' => 'OK!',
                'data' => 'nice job'
            ], 200);
        }
        return $next($request);
    }

}
