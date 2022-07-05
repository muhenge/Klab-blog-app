<?php

namespace App\Http\Controllers;
use App\Models\blog;
use App\Mail\postSaved;
use Illuminate\Http\Request;
use App\resources\views\welcome;
use Illuminate\Support\Facades\Mail;


class homecontroller extends Controller
{
  public static function index(){
   return view('welcome')->with('searchField',blog::all());
  }
  
}
