@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><h3 style="float:left">Article</h3><a href="{{ route('articleTitle', $articles->user_id) }}">
                        <button class="btn btn-primary" style="float:right">Back</button></a></h3>
                </div>

                <div class="card-body">
                   <table border="0" style="text-align: center;">
                    <thead>
                        
                        <tr>
                            <th>
                                @if ($articles->photo != "")
                                <img width="150px" height="170px" src="/images/article/{{ $articles->photo }}" alt="">
                                @endif

                                <h1>{{ $articles->title }}</h1></th>
                        </tr>
                        <tr>
                            <th><h3>{{ $articles->content }}</h3></th>

                        </tr>
                        <tr><td><a href="" class="fa fa-like">Like</a>
                        <a href="" class="fa fa-disline">Dislike</a></td></tr>
                    
                    </thead>
                   </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
