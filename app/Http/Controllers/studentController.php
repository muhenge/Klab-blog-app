<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
///use App\Models\student;
use DB;
class studentController extends Controller
{
    function index(){
$data=db::connection('mysql2')->table('student')->get();
return $data;
    }
}
