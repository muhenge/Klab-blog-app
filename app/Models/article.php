<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $primaryKey="id";
protected $fillable=[
    'title',
    'content',
    'user_id'

];

    use HasFactory;
    public function post()
    {
        return $this->belongsTo(User::class);
    }
  

}