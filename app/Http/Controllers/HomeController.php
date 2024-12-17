<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function publicMessage(Request $request){
        return response()->json([
            'message'=>'This is a public message'
        ]);
    }
}

    function privateMessage(Request $request){
    //     if(!auth()->check()){
    //     return response()->json([
    //         'message'=>'Denied'
    //     ]);
    // }

      
      return response()->json([
        'message'=>'This is private message'
      ]);

      
    }

    function secretMessage(Request $request){
        // if(!auth()->check()){
        //     return response()->json([
        //         'message'=>'Denied'
        //     ]);
        // }
    
          
        return response()->json([
            'message'=>'This is a secret message'
        ]);
    }
