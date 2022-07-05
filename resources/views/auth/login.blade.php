@extends('layouts.app')

@section('content')

<div class="d-flex  justify-content-center mb-5">
    <div class="w-50 p-4 bg-white rounded-lg">
        @if(session('status'))

        {{session('status')}}

        @endif
        <form action="{{ route('login')}}" method="post">
            @csrf
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
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Login</button>
            </div>
        </form>
    </div>

</div>
@endsection