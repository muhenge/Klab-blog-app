@extends('layout.layout')
@section('content')
  <div class="row mt-5 justify-content-center align-content-center">
    <div class="col-6">
   @foreach ($errors->all() as $item)
       {{$item}}
   @endforeach
<form action="{{route('login')}}" method="POST">
    @csrf
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
  <input type="text" name="username" class="form-control" placeholder="Username or email" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
  <input type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
</div>
<button type="submit" class="btn btn-primary">Login</button>   
</form>    
</div> 
  </div> 
@endsection