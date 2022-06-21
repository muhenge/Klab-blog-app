@extends('layout.layout')
@section('content')
{{Session::get('msg')}}
  <div class="add-article">
<form action="{{route('artical.store')}}" method="POST">
  @csrf
<input type="text" name="title" placeholder="Title"/>
<textarea name="content" placeholder="Content"></textarea>
<button type="submit">Submit</button>    
</form>    
</div>  
@endsection