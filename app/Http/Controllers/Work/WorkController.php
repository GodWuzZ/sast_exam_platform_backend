<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RequestCheck\RequestCheck;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('RequestCheck');
    } 
    public function GodWu(){
        return "GodWu";
    }

    public function RequestCheck(Request $request){
        
        return $request->user();
    }
}
