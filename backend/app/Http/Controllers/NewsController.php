<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    function get_news(){
        $news = News::all();
        return response()->json([
            "news"=>$news
        ]);
    }

    function post_news(Request $request){
        $adminId = 1;

        News::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "age_restrction"=>$request->age_restriction,
            'admin_id' => $adminId,
        ]);
        return response()->json([
            "message"=>"News post created successfully"
        ]);
    }
}
