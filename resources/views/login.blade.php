@extends('layout.layout')
@section('content')
  <div class="login">
<form action="{{route('login')}}" method="POST">
    @csrf
<input type="text" name="username"/>
<input type="password" name="password"/>
<button type="submit">Submit</button>    
</form>    
</div>  
@endsection