@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-top: -3rem" >
       <div class="row">
         <div class="col-3 " style="background: rgba(67, 185, 16, 0.687); min-height: 80vh;">
            <div class="menu_item" style="margin-left: 40px;margin-top: 20px">
                <a href="/dashbroad">
                DASHBROAD
                </a>
            </div>
            <hr>
            <div class="menu_item" style="margin-left: 40px;">
                <a href="{{route('addPost')}}">
                ADD NEW POST
            </a>
            </div>
            <hr>
            <div class="menu_item" style="margin-left: 40px">
                <a href="{{route('manager')}}">
                MANAGER POSTS
                </a>
            </div>
            <hr>
            @if(auth()->user()->role=='admin')
            <div class="menu_item" style="margin-left: 40px">
                <a href="{{route('users')}}">
                MANAGER USERS
                </a>
            </div>
            <hr>
            @endif
         </div>
         <div class="col-8" style="margin-left: 40px">
            <h2 style="text-align: center;">MANAGER USERS</h2>
            <hr>
            @if($users->count()>0)
            <table border="0" style="width: 100%;background: rgba(67, 185, 16, 0.687);color:white;font-size:15px">
                <thead>
                    <tr style="background-color:#53bb50;font: size 20px;text-align: center;">
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                        <th>Lore</th>
                        <th>Option</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr style="text-align: center;">
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role}}</td>
                        <td><a href="{{route('userProfile',$user->id)}}"> View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
         </div>
</div>
@endsection