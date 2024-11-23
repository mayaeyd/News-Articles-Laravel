<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        "title",
        "content",
        "author_id",
        "age_restriction"
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
