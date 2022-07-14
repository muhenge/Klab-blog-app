@extends('layouts.app')

@section('content')

<div class="  justify-content-center p-4 m-4">
    <div class=" p-4 bg-white rounded-lg">
        <div class="row">
            @if($posts)
            @foreach($posts as $post)
            <div class="col-4 p-4 text-center d-flex justify-content-center" style=" margin-top:10px;border-radius: 10px">
                    <a href="{{ route('post', $post->id) }}" style="text-decoration: none;">
                    <img src="/storage/{{$post->image}}" alt="" width="70" height="110">
                    
                        <div class="row" style="font-size: 14px">
                            <!-- <div class="col-6">
                                    <i>{{$post->likes()->where('islike',1)->count()}} Like(s)</i>
                            </div> -->
                            <div class="col-6">
                                    {{$post->created_at}}
                            </div>
                        </div>
                    <div class="post_title p-1" style="font-size:30px">
                    <b> {{$post->title}}</b>
                    </div>
                    
                </a>
                <div class="content p-1" style="font-size:20px">
                    <p>{{$post->content}}</p>
</div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection