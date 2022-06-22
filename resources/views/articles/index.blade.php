@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Aricles') }}</div>

                <div class="card-body">
                   <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>N <sup>o</sup></th>
                            <th>Titile</th>
                            <th>Body</th>
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
                                {{ $article->content }}
                            </td>
                            <td>Action</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <center><h5 style="color:red; size:24px;">No Articles found in database.</h5></center>
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
