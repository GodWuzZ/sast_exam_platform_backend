<?php

namespace App\Http\Middleware\Contest;

use App\Models\Contest;
use Closure;
use Illuminate\Http\Request;

class IsRunning
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
        if(Contest::running()){
            return $next($request);
        }
        return response()->json([
            'ret'  => 403,
            'desc' => 'Contest End.'
        ]);
    }
}
