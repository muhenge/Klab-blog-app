<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Likeable;
    protected $table='posts';  
    protected $fillable=['title','description','user_id','image']; 

    //public function post(){
    //    return $this->belongsTo(User::class);
    //}
    
   
}


