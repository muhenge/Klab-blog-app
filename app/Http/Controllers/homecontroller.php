<?php

namespace App\Http\Controllers;
use App\Models\blog;
use Illuminate\Http\Request;
use App\resources\views\welcome;


class homecontroller extends Controller
{
  public static function index(){
    return view('welcome')->with('searchField',blog::all());
  }
  
}
