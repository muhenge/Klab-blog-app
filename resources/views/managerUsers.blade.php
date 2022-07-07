@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-top: -2.4rem" >
       <div class="row">
         <div class="col-3 " style="background: rgb(14, 40, 113);e; min-height: 100vh;">
            <div class="menu_item" style="margin-left: 20px;margin-top: 20px">
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
            <div class="menu_item" style="margin-left: 20px" class="text-white">
                <a href="{{route('manager')}}">
                MANAGER POSTS
                </a>
            </div>
            <hr>
            @if(auth()->user()->role=='admin')
            <div class="menu_item" style="margin-left: 20px">
                <a href="{{route('users')}}" class="text-white">
                MANAGER USERS
                </a>
            </div>
            <hr>
            @endif
         </div>
         <div class="col-8" style="margin-left: 20px" class="text-white">
            <h2>MANAGER USERS</h2>
            <hr>
            @if($users->count()>0)
            <table border="1" style="width: 100%">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->username}}</td>
                        <td><a href="{{route('userProfile',$user->id)}}"> View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
         </div>
</div>
@endsection