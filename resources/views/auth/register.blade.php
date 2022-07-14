@extends('layouts.app')

@section('content')

<div class="d-flex  justify-content-center mb-5">
    <div class="w-30 p-4 bg-green rounded-lg">
        <form action="{{ route('register')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="firstname">Firstname </label>
                <input type="text" class="form-control @error('firstname') border border-danger  @enderror" id="firstname" aria-describedby="emailHelp" name="firstname" placeholder="Enter firstname" value="{{old('firstname')}}">
                @error('firstname')
                <small class="mt-2 text-red-200" style="color:red">
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="lastname">Lastname </label>
                <input type="text" class="form-control @error('lastname') border border-danger  @enderror" id="lastname" aria-describedby="emailHelp" name="lastname" placeholder="Enter lastname" value="{{old('lastname')}}">
                @error('lastname')
                <small class="mt-2 text-red-200" style="color:red">
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username </label>
                <input type="text" class="form-control @error('username') border border-danger  @enderror" id="username" aria-describedby="emailHelp" name="username" placeholder="Enter username" value="{{old('username')}}">
                @error('username')
                <small class="mt-2 text-red-200" style="color:red">
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control  @error('email') border border-danger  @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                @error('email')
                <small class="mt-2 text-red-200" style="color:red">
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control  @error('password') border border-danger  @enderror" id="password" name="password" placeholder="Password">
                @error('password')
                <small class="mt-2 text-red-200" style="color:red">
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirmation" placeholder="Retye your Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control"style="background-color:#66b364">Register</button>
            </div>
        </form>
    </div>

</div>
@endsection