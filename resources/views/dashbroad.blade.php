@extends('layouts.app')

@section('content')

<nav class="p-4 mb-5  d-flex justify-content-center text-red-200 " style=" font-size:20px">
            <ul class="d-flex text-center nav text-black">
            <li>
            <button class="inline" style="border: none; background-color:#66b364;margin-left: 40px;"> <a href="{{route('addPost')}}">
                ADD NEW POST
               
            </a>
</button>
            </li>
           <li>
           <button class="inline" style="border: none; background-color:#66b364;margin-left: 40px;">
                <a href="{{route('manager')}}">
                    MANAGER POSTS
                  
                    </a>
</button>
                    </li>
         
            @if(auth()->user()->role=='admin')
           <li>
           <button class="inline" style="border: none; background-color:#66b364;margin-left: 40px;">
                <a href="{{route('users')}}">
                    MANAGER USERS
                    </a>
                    </a>
</button>
                    </li>
            @endif
         
       </ul>
      </nav>

@endsection