@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-top: -2.4rem" >
       <div class="row">
         <div class="col-2 " style="background: rgb(14, 40, 113);  min-height: 100vh; ">
            <div class="menu_item" style="margin-left: 20px;margin-top: 10px; text-white; ">
                <a href="/dashbroad" class="text-white">
                    DASHBROAD
                    </a>
            </div>
            <hr>
            <div class="menu_item" style="margin-left: 20px;">
                <a href="{{route('addPost')}}" class="text-white">
                ADD NEW POST
            </a>
            </div>
            <hr>
            <div class="menu_item" style="margin-left: 20px">
                <a href="{{route('manager')}}" class=" text-white ">
                    MANAGER POSTS
                    </a>
            </div>
            <hr>
            @if(auth()->user()->role=='admin')
            <div class="menu_item" style="margin-left: 20px">
                <a href="{{route('users')}}" class="text-white ">
                    MANAGER USERS
                    </a>
            </div>
            <hr>
            @endif
         </div>
         <div class="col-9" style="margin-left: 20px">
            <h4>Welcome To Your Dashboard</h4>
            <hr>
            <div class="row">
               
                </div>
            </div>
         </div>
</div>
@endsection