@extends('layout.layout')
@section('content')
  <div class="add-article">
<form action="{{route('artical.update',$artical->id)}}" method="POST">
  @csrf
  @method('PATCH')
<input type="text" name="title" placeholder="Title" value="{{$artical->title}}"/>
<textarea name="content" placeholder="Content">{{$artical->content}}</textarea>
<button type="submit">Submit</button>    
</form>    
</div>  
@endsection