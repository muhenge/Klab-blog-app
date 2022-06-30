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

    static function uploadImage($image,$path='/image/')
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $imagepath=public_path($path);
        $image->move($imagepath,$imagename);
        return $path.$imagename;
    }
    public static function find($usern){
        return static::all()->firstWhere('user_id',$usern);
     }
     public function likes(){
        return $this->hasmany(likes::class);
     }
     public function likedBy(user $user){
        return $this->likes->contains('user_id',$user->id);
     }
     public function OwnedBy(user $user){
        return $user->id===$this->user_id;
     }
}
