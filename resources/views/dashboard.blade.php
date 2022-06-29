@extends('layout.layout')
@section('content')
  <div class="row mt-5 justify-content-center align-content-center">
    <div class="col-6">
    <div class="alert alert-success" role="alert">
  List Of Users
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">profilImage</th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($users as $user)

    <tr>
      <td>
        @if($user->profile)
    <img class="image-fluid" width="80" height="80" src="{{URL::to('/')}}/users/{{$user->profile}}" alt="profile"/>
    @else
    <img class="image-fluid" width="80" height="80" src="https://hiredevs.herokuapp.com/assets/img-d28bb9135cdb5a9c6f4114085ec41fd3f3df4ea5b8207a33c2aa258ddb0ecbf3.png" alt="profile"/>
    @endif
      </td>
      <td>{{$user->username}}</td>
      </tr>
      @endforeach
    

    
  </tbody>
</table>

  

<div class="alert alert-success mt-5" role="alert">
  My Articles
</div>

@if(Session::has('msg'))
<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif
<div class="row justify-content-center">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">image</th>
      <th scope="col">title</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($articles as $article)

    <tr>
      <td>
        @if($user->profile)
    <img class="image-fluid" width="80" height="80" src="{{URL::to('/')}}/blogs/{{$article->image}}" alt="blog_image"/>
    @else
    <img class="image-fluid" width="80" height="80" src="https://kravmaganewcastle.com.au/wp-content/uploads/2017/04/default-image.jpg" alt="blog_image"/>
    @endif
      </td>
      <td>{{$article->title}}</td>
      <td><a href="{{route('artical.edit',Crypt::encrypt($article->id))}}" class="btn btn-link"><i class="bi bi-pencil-square"></i></a></td>
      <td>
        <form action="{{route('artical.destroy',Crypt::encrypt($article->id))}}" method="POST">
                @csrf
                @method('DELETE')
             <button class="btn btn-link"><i class="bi bi-archive"></i></button>
             </form>
      </td>
      </tr>
      @endforeach
    

    
  </tbody>
</table>

  </div>
    
    
@endsection