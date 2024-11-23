<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        "title",
        "content",
        "admin_id",
        "age_restrction"
    ];

    public function author(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
