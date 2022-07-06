<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class PostView extends Controller
{
    public function destroy($id)
    {
        // echo $id;
           
        $query= User::find($id)->hi;
 
     
        return view('homePost',compact('query'));
    }
}
