<?php

namespace App\Http\Middleware\Mark;

use App\Models\Group;
use App\Models\GroupMember;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Examiners
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
        if(!Auth::check())
        {
            if($request->method() == 'GET') {
                return redirect('/');
            }else{
                return response()->json([
                    'ret'  => 403,
                    'desc' => 'forbidden!',
                    'data' => ''
                ], 403);
            }
        }else{
            $group_member = GroupMember::where('user_id',Auth::user()->id)->first();
            if(empty($group_member)){
                if($request->method() == 'GET') {
                    return redirect('/');
                }else{
                    return response()->json([
                        'ret'  => 403,
                        'desc' => 'forbidden!',
                        'data' => ''
                    ], 403);
                }
            }
        }
        $group = Group::find($group_member->group_id);
        $request->merge([
            'group' => $group
        ]);
        return $next($request);
    }
}
