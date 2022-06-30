@extends('layouts.app')
@php
    use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\user;
use App\Models\Like;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleEmail;
use Illuminate\Support\Facades\Crypt;
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>{{ __('All articles') }}</h3></div>

                <div class="card-body">
                   

                    <main>
                        <div class="container-services">
                            <div class="card-service">
                                <div class="card-title">
                                   
                                </div>
                                <div class="service-body">

                                    @forelse ($articles as $article)
                                    <div class="card">
                                        <div class="card-title">
                                            <div class="icon">
                                                @if ($article->photo != "")
                                                <img src="/images/article/{{ $article->photo }}" alt="">
                                                @endif
                                            </div>
                                            {{ $article->title }}
                                        </div>
                                        @php
                                             $user_id = Auth()->user()->id;
                                            $user = Like::all()->where('user_id', $user_id)->where('article_id', $article->id)->where('likes', '<=', 1);
                                            $user_count = collect($user)->count();

                                             //user dislike
                                            $user2 = Like::all()->where('user_id', $user_id)->where('article_id', $article->id)->where('dislikes', 1);
                                            $user_count2 = collect($user2)->count();

                                            //count likes
                                            $likes = Like::all()->where('article_id', $article->id)->where('likes', 1);
                                            $count = collect($likes)->count();

                                            // count dislikes
                                            $likes2 = Like::all()->where('article_id', $article->id)->where('dislikes', 1);
                                            $count2 = collect($likes2)->count();
                                        @endphp
                                        <div class="card-body">
                                            {{ Str::substr($article->content, 0, 87) }}...
                                            <div class="card-action">
                                                <p class="read-more"><a href="{{ route("articleContentAll", $article->id) }}">Read More</a></p>
                                                <div class="like">
                                                    {{-- <i class="far fa-thumbs-up">&nbsp;{{ $count }} </i> --}}
                                                    @if ($user_count == 0)
                                                    <a href="{{ route('likeIndexAll', $article->id) }}"><i class="far fa-thumbs-up"></i></a>&nbsp; {{ $count }}
                                                    @else
                                                    <i class="fas fa-thumbs-up"></i></a>&nbsp; {{ $count }}
                                                    @endif

                                                    
                                                    @if ($user_count == 0)
                                                <a href="{{ route('dislikeIndexAll', $article->id) }}"><i class="far fa-thumbs-down"></i></a>&nbsp; {{ $count2 }}
                                                    @elseif ($user_count == 1)
                                                        <i class="fas fa-thumbs-down"></i>&nbsp; {{ $count2 }}
                                                    @else
                                                    <i class="far fa-thumbs-down"></i></a>&nbsp; {{ $count2 }}
                                                    @endif
                                                </div>
                                               
                                            </div>
                                        </div>
                                        
                                    </div>
                                    @empty
                                    <div class="card">
                                        <div class="card-title">
                                            <div class="icon">
                                                {{-- <i class="fa fa-wrench"></i> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 style="color:red; size:24px;">No Articles found in database.</h5>
                                        </div>
                                    </div>

                                    
                                    @endforelse
                                    
                                </div>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
