<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class WorkController extends Controller
{
    public function GodWu(){
        if(Request::has('username','password')){
            $name= Request::input('username');
            $password=Request::input('password');
            return response()->json([
                 'username'=>$name,
                 'password' => $password
            ]);
        }
        else return response()->json([
            'type'=>'false',
            'data'=>'403'
        ]);
    }
}
