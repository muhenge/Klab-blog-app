<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class RegisterCtrl extends Controller
{
    public function show(){
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        Log::info($request);
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect()->route('login');
    }
}
