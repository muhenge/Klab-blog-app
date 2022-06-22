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
                            <th><h1>{{ $articles->title }}</h1></th>
                        </tr>
                        <tr>
                            <th><h3>{{ $articles->content }}</h3></th>

                        </tr>
                    
                    </thead>
                   </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
