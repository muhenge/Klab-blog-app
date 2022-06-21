@extends('layout.layout')
@section('content')
  <div class="register">
<form action="{{route('register')}}" method="POST">
    @csrf
<input type="text" name="username" placeholder="username"/>
<input type="email" name="email" placeholder="email"/>
<input type="password" name="password" placeholder="password"/>
<button type="submit">Submit</button>    
</form>    
</div>  
@endsection