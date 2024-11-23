<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    function post_article(Request $request){
        $userId=2;

        Article::create([
            "content"=>$request->content,
            "user_id"=>$userId,
            "news_id"=>$request->news_id
        ]);

        return response()->json([
            "message"=>"Article posted successfully"
        ]);
    }
}
