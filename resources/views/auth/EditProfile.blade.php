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
            <h2>EDIT PROFILE</h2>
            <hr>
            {{-- @foreach($user as $profile) --}}
            <div class="col-12 " style="background: white; min-height: 80vh;">
                <form action="{{ route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="image">Profile Image</label>
                        <div class="row">
                        <img src="/storage/img/user.png" alt="" width="150" style="border-radius: 50%">
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="col-6">
                                    <button>Change</button>
                                </div>
                            </div>
                            <br><br>
                        </div>
                        <input type="file" class="form-control  @error('image') border border-danger  @enderror" id="image" name="image" aria-describedby="imageHelp" placeholder="Enter image" value="{{old('image')}}" style="display: none">
                        @error('image')
                        <small class="mt-2 text-red-200" style="color:red">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="firstname" class="form-control  @error('firstname') border border-danger  @enderror" id="firstname" name="firstname" aria-describedby="firstnameHelp" placeholder="Enter firstname" value="{{old('firstname')}} {{auth()->user()->firstname}}">
                        @error('firstname')
                        <small class="mt-2 text-red-200" style="color:red">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control  @error('lastname') border border-danger  @enderror" id="lastname" name="lastname" placeholder="lastname" value="{{auth()->user()->lastname}}">
                        @error('lastname')
                        <small class="mt-2 text-red-200" style="color:red">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control  @error('username') border border-danger  @enderror" id="username" name="username" placeholder="username" value="{{auth()->user()->username}}">
                        @error('username')
                        <small class="mt-2 text-red-200" style="color:red">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Update</button>
                    </div>
                </form>
            </div>
            {{-- @endforeach --}}
         </div>
</div>
@endsection