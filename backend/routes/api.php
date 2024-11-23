<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/news', [NewsController::class, "get_news"]);
Route::post('/news', [NewsController::class, "post_news"]);

