<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;

class NewsController extends Controller
{
    function get_news(Request $request){
        $age = $request->age ?? null;

        if($age){
            $news = News::where('age_restrction', '<=', $age)
                    ->orWhereNull('age_restrction')
                    ->get();
        }else{
            $news = News::all();
        }

        
        return response()->json([
            "news"=>$news
        ]);
    }

    function post_news(Request $request){
        $user = User::find(1);

        if($user->role !== 'admin'){
            return response()->json([
                "error"=>"Unauthorized action"
            ],403);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news-images', 'public');
        }

        News::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "age_restrction"=>$request->age_restriction,
            'admin_id' => $user->id,
            'image_path'=>$imagePath
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
