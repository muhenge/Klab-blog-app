@extends('layouts.app')

@section('content')

<div class="  justify-content-center p-4 m-4">
    <div class=" p-4  rounded-lg">
        <div class="row p-5">
            @if($posts)
            @foreach($posts as $post)
            <div class=" p-2">
                <div class="post_title p-1">
                  <i>Title: <b>{{$post->title}}</b></i>
                  <div class="content pt-4">
                    <span style="font-size: 18px; ">{{$post->content}}</span>   
               </div>
                </div>
                <img src="/storage/app/public/uploads{{$post->image}}" alt="" width="300" height="300">
                @foreach($users as $user)
                    @if($user->id == $post->user_id)
                        <div class="user">
                            <i>Username:{{$user->username}}</i>
                        </div>
                    @endif
                @endforeach
                <div class="like">
                    <a href="{{route('like',$post->id)}}">
                    <i><button style="font-size:14px; background: rgb(77, 154, 255); border: none;">{{$post->likes()->where('islike',1)->count()}} Like <i class="fa fa-thumbs-o-up"></i></button></i>
                </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection