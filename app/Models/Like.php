<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'likes',
        'dislikes',
        'article_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongTo(User::clas);
    }

    public function article()
    {
        return $this->belongTo(Article::class);
    }
}
