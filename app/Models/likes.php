<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'user_id',
        'blog_id'
    ];
    public function blog(){
        return $this->belongsTo(blog::class);
    }
}
