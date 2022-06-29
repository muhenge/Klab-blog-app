@extends('layout.layout')
@section('content')
  <div class="row mt-5 justify-content-center align-content-center">
    @foreach ($errors->all() as $item)
       {{$item}}
   @endforeach
    <div class="col-6">
<form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
  <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
  <input type="email" class="form-control" name="email" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
  <input type="password" class="form-control" name="password" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-images"></i></span>
  <input type="file" class="form-control" name="profile" placeholder="Upload" aria-label="profile" aria-describedby="basic-addon1">
</div>

<button type="submit" class="btn btn-primary">Register</button>   
</form>    
</div> 
  </div> 
@endsection