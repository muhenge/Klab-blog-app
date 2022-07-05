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
                        
                        {{-- <tr><td>
                            <div class="like">
                                @if ($user_count == 0)
                                <a href="{{ route('likeIndex', $articles->id) }}"><i class="far fa-thumbs-up"></i></a>&nbsp; {{ $count }}
                                @else
                                <i class="fas fa-thumbs-up"></i></a>&nbsp; {{ $count }}
                                @endif

                                
                                @if ($user_count == 0)
                               <a href="{{ route('dislike
                               Index', $articles->id) }}"><i class="far fa-thumbs-down"></i></a>&nbsp; {{ $count2 }}
                                @elseif ($user_count == 1)
                                    <i class="fas fa-thumbs-down"></i>&nbsp; {{ $count2 }}
                                @else
                                <i class="far fa-thumbs-down"></i></a>&nbsp; {{ $count2 }}
                                @endif
                        </div>

                        
                    </td></tr> --}}
                    
                    </thead>
                   </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
