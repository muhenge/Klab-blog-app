@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                                        <div class="card-body">
                                            {{ $article->content }}
                                            <div class="card-action">
                                                <p class="read-more"><a href="{{ route("articleContent", $article->id) }}">Read More...</a></p>
                                                <div class="like"><i class="far fa-thumbs-up">&nbsp;13 </i></div>
                                                {{-- <p class="dislike"><i class="">&nbsp;13</p> --}}
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
