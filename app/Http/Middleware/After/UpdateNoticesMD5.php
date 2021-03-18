<?php

namespace App\Http\Middleware\After;

use App\Models\Announcement;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UpdateNoticesMD5
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

        $announcements = Announcement::fetch();
        Cache::put('notices_md5',md5(json_encode($announcements)));

        return $response;
    }
}
