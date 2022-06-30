@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><h3 style="float:left">List of Artcles</h3><a href="{{ route('userIndex') }}">
                        <button class="btn btn-primary" style="float:right">Back</button></a></h3>
                </div>

                <div class="card-body">
                   <table class="table table-condensed table-hover">
                    <thead>
                       @php
                            $i=1;
                       @endphp
                        @forelse ($articles as $article)
                            <tr style="cursor: pointer;">
                                <th>
                                    <a style="text-decoration: none; color:black; font-size:18px;" href="{{ route("articleContent", $article->id) }}">
                                        {{ $article->title }}
                                    </a>
                                </th>
                                
                                @php
                                    $i++
                                @endphp
                            </tr>
                        @empty
                        <tr>
                            <td colspan="2">
                                <center><h5 style="color:red; size:24px;">No Article found in database.</h5></center>
                            </td>
                        </tr>
                        @endforelse
                    </thead>
                   </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
