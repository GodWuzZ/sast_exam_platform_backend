<?php

namespace App\Http\Middleware\After;

use App\Models\Problem;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UpdateProblemsMD5
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
        $response = $next($request);

        $problems = Problem::fetch();
        Cache::put('problems_md5',md5(json_encode($problems)));

        return $response;
    }
}
