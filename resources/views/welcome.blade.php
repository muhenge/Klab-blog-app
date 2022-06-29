@extends('layout.layout')
@section('content')


  <div class="row justify-content-center">
    <div class="col-6">
    @foreach($articles as $article)
    <a href="{{route('artical.show',Crypt::encrypt($article->id))}}" class="text-decoration-none">
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
        @if($article->image)
      <img src="{{URL::to('/')}}/blogs/{{$article->image}}" class="img-fluid rounded-start" alt="article">
      @else
      <img src="https://kravmaganewcastle.com.au/wp-content/uploads/2017/04/default-image.jpg" class="img-fluid rounded-start" alt="article">
      @endif
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$article->title}}</h5>
        <p class="text-muted">{{substr($article->content, 350)}}</p>
        Read More.....
      </div>
    </div>
      <div class="card-footer">
      <span class="badge bg-secondary">{{$article->likes}} Likes</span>
       <small class="text-muted">{{$article->created_at->diffForHumans()}}</small>
    </div>
  </div>
</div>
    </a>
@endforeach
    </div>
  </div>
@endsection