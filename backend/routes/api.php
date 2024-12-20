<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ArticlesController;

Route::get('/news', [NewsController::class, "get_news"]);
Route::post('/news', [NewsController::class, "post_news"]);
Route::put('news/{id}', [NewsController::class, "edit_news"]);
Route::delete('news/{id}',[NewsController::class, "remove_news"]);
Route::post('/articles', [ArticlesController::class, "post_article"]);