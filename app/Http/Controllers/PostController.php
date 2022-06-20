<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use SweetAlert;

class PostController extends Controller
{
    function  ddj()
    {

       $AlertType='success';

        // Alert::toast('Your Data has been deleted!','warning');
       // Alert::success('this is success alert');
       Alert::question('Question Title', 'Question Message');
        return view('hello');
    }
}
