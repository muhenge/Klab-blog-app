@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><h3 style="float:left">Your Articles</h3><a href="{{ route('articlesCreate') }}">
                        <button class="btn btn-primary" style="float:right">New Article</button></a></h3>
                </div>

                <div class="card-body">
                   <table class="table table-condensed table-hover">
                    <thead>
                        @if (session('success'))
                               <tr>
                                <td colspan="5">
                                    <div class="alert bg-green">
                                        {{ session('success') }}
                                      </div>
                                </td>
                               </tr>
                                @endif
                        <tr>
                            <th>N <sup>o</sup></th>
                            <th style="width: 18%">Title</th>
                            <th>Photo</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php
                            $i=1;
                       @endphp
                        @forelse ($articles as $article)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                {{ $article->title }}
                            </td>
                            <td>
                                @if ($article->photo != "")
                                <img width="70px" height="80px" src="/images/article/{{ $article->photo }}" alt="">
                                @else
                                {{ 'No photo' }}
                                @endif
                            </td>
                            <td>
                                {{-- {{ $article->content }} --}}
                                {{ Str::substr($article->content, 0, 210) }}...
                            </td>
                            <td style="width: 20%">
                                <a href="{{ route('articlesEdit', $article->id) }}"><button class="btn btn-info">Update</button></a>
                                <a onclick="return confirm('Are you sure?')" href="{{ route('articlesDelete', $article->id) }}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                            @php
                                $i++
                            @endphp
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <center><h5 style="color:red; size:24px;">You don't have any article.</h5></center>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                   </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
