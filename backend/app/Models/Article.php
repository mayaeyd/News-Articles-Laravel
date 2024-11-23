<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'content',
        'news_id',
        'admin_id',
    ];

    public function news(){
        return $this->belongsTo(News::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}