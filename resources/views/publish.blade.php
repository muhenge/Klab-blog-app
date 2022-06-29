@extends('layout.layout')
@section('content')
  <div class="row mt-5 justify-content-center align-content-center">
    <div class="col-6">
        @foreach ($errors->all() as $item)
       {{$item}}
   @endforeach
<form action="{{route('artical.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
  <input type="text" class="form-control" name="title" placeholder="title">
</div>
<div class="mb-3">
  <textarea class="form-control" name="content" placeholder="Content..." rows="3"></textarea>
</div>
<div class="mb-3">
  <input type="file" class="form-control" name="image" placeholder="Upload" aria-label="image" aria-describedby="basic-addon1">
</div>
<button type="submit" class="btn btn-primary">Submit</button>   
</form>    
</div> 
  </div> 
@endsection