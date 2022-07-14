@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="  justify-content-center p-4 m-4">
    <div class=" p-4 bg-white rounded-lg">
 
        <div class="row">
            @if($posts)
            @foreach($posts as $post)
            <div class="col-4 p-4 " style=" margin-top:10px;border-radius: 10px">
                    <a href="{{ route('post', $post->id) }}" style="text-decoration: none;">
                        <img src="{{asset($post->image)}}" alt="" width="300" height="300">
                    
                        <div class="row text-dark" style="font-size: 14px">
                            <div class="col-6 p-2">
                                    <i><button style="font-size:14px; background: rgb(77, 154, 255); border: none;">{{$post->likes()->where('islike',1)->count()}} Like <i class="fa fa-thumbs-o-up"></i></button></i>
                            </div>
                            <div class="col-6">
                                    {{$post->created_at}}
                            </div>
                        </div>
                    <div class="post_title p-1 text-dark" style="font-size:20px">
                    <b> {{$post->title}}</b>
                    </div>
                </a>
                </div>
            @endforeach
            @endif
        </div>

    </div>
</div>
@endsection