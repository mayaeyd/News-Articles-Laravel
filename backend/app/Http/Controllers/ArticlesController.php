<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;

class ArticlesController extends Controller
{
    function post_article(Request $request){
        $user = User::find(2);

        if($user->role !== 'user'){
            return response()->json([
                "error"=>"Unauthorized action"
            ],403);
        }

        Article::create([
            "content"=>$request->content,
            "user_id"=>$user->id,
            "news_id"=>$request->news_id
        ]);

        return response()->json([
            "message"=>"Article posted successfully"
        ]);
    }
}
