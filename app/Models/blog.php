<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'blog';
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
