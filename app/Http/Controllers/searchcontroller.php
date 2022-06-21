<?php

namespace App\Http\Controllers;

use App\Models\blog;

use Illuminate\Http\Request;

class searchcontroller extends Controller
{
    public function search(request $request){
        $query = $request->input('search');
    
        if($query){
            $searchField= blog::where('title','like',"%{$query}%")
                             ->orWhere('description','like',"%{$query}%")
                        ->simplepaginate(3)
                      
                        ->appends(['search'=>$query]);
                        
                        
        }else{
            $searchField=blog::simplepaginate(5);
            
        }
        return view('welcome',['results'=>$searchField])->with('searchField',$searchField);
       
    }
 } 

