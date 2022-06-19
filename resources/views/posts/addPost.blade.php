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
            <h2>ADD NEW POST</h2>
            <hr>
            <form action="{{ route('addPost')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" class="form-control @error('title') border border-danger  @enderror" id="title" aria-describedby="emailHelp" name="title" placeholder="Enter title" value="{{old('title')}}">
                    @error('title')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <textarea name="content" class="form-control  @error('content') border border-danger  @enderror" id="content" aria-describedby="emailHelp" placeholder="Enter content" rows="3"></textarea>
                    @error('content')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Cover image</label>
                    <input type="file" class="form-control  @error('email') border border-danger  @enderror" id="image" name="image" aria-describedby="emailHelp" value="{{old('email')}}">
                    @error('image')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Add</button>
                </div>
            </form>
         </div>
</div>
@endsection