<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;
    protected $fillable=['title','content','user_id','image'];

    public function post(){
        return $this->belongsTo(User::class);
    }


}
