@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
            @if(session('status'))

            {{session('status')}}
    
            @endif
            <form action="{{ route('login')}}" method="post">
                @csrf
              <div class="form-floating mb-3">
                <input type="email" class="form-control  @error('email') border border-danger  @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                @error('email')
                <small class="mt-2 text-red-200" style="color:red">
                    {{$message}}
                </small>
                @enderror
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control  @error('password') border border-danger  @enderror" id="password" name="password" placeholder="Password">
                @error('password')
                <small class="mt-2 text-red-200" style="color:red">
                    {{$message}}
                </small>
                @enderror
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                  in</button>
              </div>
              
              
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection