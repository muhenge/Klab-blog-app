@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-top: -2.4rem" >
       <div class="row">
         <div class="col-3 " style="background: white; min-height: 80vh;">
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
            <h2>MANAGER POSTS</h2>
            <hr>
            @if($posts->count()>0)
            <table border="1" style="width: 100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Auth</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        @foreach($users as $user)
                            @if($user->id===$post->user_id)
                                <td>{{$user->username}}</td>
                            @endif
                        @endforeach
                        <td><a href="{{ route('post', $post->id) }}">View</a> <a>Edit</a> <a>Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
         </div>
</div>
@endsection