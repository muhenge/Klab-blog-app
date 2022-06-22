<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;

class QrcodeController extends Controller
{
    public function index(){
        return view('testMe.codeView');
    }
}
