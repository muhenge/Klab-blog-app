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
        //  $users = User::all()->where('id', '!=', Auth()->user()->id);
        // return view('users.index', compact('users'));
        return redirect()->route('userIndex');
    }
}
