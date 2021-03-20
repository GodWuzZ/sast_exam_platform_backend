<?php

namespace App\Http\Middleware\work;

use Closure;
use Illuminate\Http\Request;

class check{

    /**
     * 判断传入的类型是否是post
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){

        $username = $request->username;
        $password = $request->password;

        if($request->method() == 'GET'){

            abort(404, 'not support for GET');

        }else{

            if($username && $password){

                 return response()->json([

                'ret'  => 200,
                'desc' => 'success!',
                'data' => 'a good saster'

                ], 200);

            }else{

                abort(403, 'the message was not complete');

            }

        }

        return $next($request);

    }

}
