<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    function test_api(){
        return response()->json([
            "message"=>"Hello World!"
        ]);
    }
}
