@extends('layouts.app')

@section('content')

<div class="  justify-content-center p-4 m-4">
    <div class=" p-4 bg-white rounded-lg">
        <div class="row">
            @if($posts)
            @foreach($posts as $post)
            <div class=" p-4 text-center">
                <div class="post_title p-1">
                   <b> <h2>{{$post->title}}</h2></b>
                </div>
                <img src="/storage/{{$post->image}}" alt="" width="300" height="400">
                @foreach($users as $user)
                    @if($user->id == $post->user_id)
                        <div class="user">
                            <i>Auth:{{$user->username}}</i>
                        </div>
                    @endif
                @endforeach
                <div class="like">
                    <a href="{{route('like',$post->id)}}">
                    <button>like</button>
                </a>
                </div>
                <div class="content" style="text-align: left; padding:20px">
                     <p style="font-size: 20px; text-algin: start">{{$post->content}}</p>   
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection