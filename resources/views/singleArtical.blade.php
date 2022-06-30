@extends('layout.layout')
@section('content')
  <div class="row justify-content-center">
    <div class="col-6">
    <div class="card">
      @if($article->image)
      <img src="{{URL::to('/')}}/blogs/{{$article->image}}" class="img-fluid rounded-start card-img-top" alt="article">
      @else
      <img src="https://kravmaganewcastle.com.au/wp-content/uploads/2017/04/default-image.jpg" class="img-fluid rounded-start card-img-top" alt="article">
      @endif
    <h5 class="card-title mx-3">{{$article->title}}</h5>
    <p class="card-subtitle text-muted mx-3">
    {{$article->created_at->diffForHumans()}}
    </p>
  <div class="card-body">
    <p class="card-text"> {{$article->content}}</p>
  </div>
  <div class="card-footer">
    <form action="{{route('like',$article->id)}}" method="POST">
      @csrf
      @method('PUT')
      <button type="submit"><span class="badge bg-secondary">{{$article->likes}} <i class="bi bi-heart"></i></span></button>
    </form>
  </div>
</div>
    </div>
  </div>
@endsection