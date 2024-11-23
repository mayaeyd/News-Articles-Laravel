<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    function get_news(){
        return response()->json([
            "message"=>"Hello World!"
        ]);
    }
}
