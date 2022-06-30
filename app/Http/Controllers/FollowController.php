<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    public function Follow($id)
    {
        $user_id = Auth()->user()->id;
        Follow::create([
            'follow' =>1,
            'user1_id' =>$user_id,
            'user2_id' => $id,
        ]);
        return redirect()->route('userIndex');
    }

    public function Unfollow(Follow $follow ,$id)
    {
        $follow->find($id)->delete();
        return redirect()->route('userIndex');
    }
}
