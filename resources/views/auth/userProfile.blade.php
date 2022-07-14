@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-top: -2.4rem" >
       <div class="row">
         <div class="col-2 ">
            
         </div>
         <div class="col-8" style="margin-left: 40px">
            <B>USER PROFILE</B>
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
                                <button class="btn btn-warning">Edit Profile</button>
                            </a>
                          </div>
                          @endif
                       </div>
                       <div class="d-flex">
                        <div class="pr-5 text-bold"><b>{{$profile->posts()->count()}}</b> Post </div>
                        <div class="pr-5"><strong>23k</strong> followers </div>
                        <div class="pr-5 "><strong>2</strong> following </div>
                
                    </div>
                    <div  class="pt-4 font-weight-bold">Category: Auth</div>
                    <div> Bio </div>
                    <div> <a href="">www.blog.com</a></div>
                       <div class="row pt-4">
                        
                       </div>
                       <div class="row pt-4">
                          <div class="col-8">
                              <b>Name: {{$profile->firstname}} {{$profile->lastname}}</b>
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