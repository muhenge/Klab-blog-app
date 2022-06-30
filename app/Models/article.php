<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
class article extends Model
{
    protected $primaryKey="id";
protected $fillable=[
    'title',
    'content',
    'user_id',
    'picture'
];
protected $appends=['hashed_id'];
    use HasFactory,Hashidable;
    public function post()
    {
        return $this->belongsTo(User::class);
    }
    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }

}