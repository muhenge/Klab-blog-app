@extends('layout.layout')
@section('content')
  <div class="add-article">
<form action="{{route('artical.update',Crypt::encrypt($artical->id))}}" method="POST">
  @csrf
  @method('PATCH')
<div class="mb-3">
  <input type="text" class="form-control" name="title" value="{{$artical->title}}" placeholder="title">
</div>
<div class="mb-3">
  <textarea class="form-control" name="content" placeholder="Content..." rows="3">{{$artical->content}}</textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>     
</form>    
</div>  
@endsection