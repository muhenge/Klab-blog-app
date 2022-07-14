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
            <h2>USER PROFILE</h2>
            <hr>
            @foreach($user as $profile)
            <div class="col-12 " style="background: white; min-height: 80vh;">
                <div class="row pt-4">
                    <div class="col-4 ">
                        <img src="/storage/img/user.png" alt="" width="150" style="border-radius: 50%">
                    </div>
                    <div class="col-7">
                       <div class="row">
                          <div class="col-6">
                            <h1>{{$profile->username}}</h1>
                          </div>
                          @if(auth()->user()->id == $profile->id)
                          <div class="col-4">
                            <a href="{{route('editProfile')}}">
                                <button>Edit Profile</button>
                            </a>
                          </div>
                          @endif
                       </div>
                       <div class="row pt-4">
                          <div class="col-8">
                              <h3>{{$profile->posts()->count()}} Posts</h3>
                          </div>
                       </div>
                       <div class="row pt-4">
                          <div class="col-8">
                              <h3>{{$profile->firstname}} {{$profile->lastname}}</h3>
                          </div>
                       </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-4">
                        <a href="{{ route('post', $post->id) }}" style="text-decoration: none" title="{{$post->title}}">
                        <img src="/storage/{{$post->image}}" alt="" width="200" height="200">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
         </div>
</div>
@endsection