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

    function edit_news(Request $request, $id){
        $news = News::find($id);

        if(!$news){
            return response()->json([
                "message"=>"News post not found"
            ], 404);
        }

        $news->update([
            "title"=>$request->title,
            "content"=>$request->content,
            "age_restrction"=>$request->age_restriction,
        ]);
        return response()->json([
            "updated-news"=>$news
        ]);
    }

    function remove_news(Request $request, $id){
        $news = News::find($id);

        if(!$news){
            return response()->json([
                "message"=>"News post not found"
            ], 404);
        }

        $news->delete();

        return response()->json([
            "deleted news"=>$news
        ]);
    }
}
