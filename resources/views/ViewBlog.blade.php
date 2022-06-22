@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-white bg-success text-center">
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $item)
                        <td>{{ $item->title}}</td>
                        <td>{{ $item->content}}</td>
                    @endforeach 


                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4"></div>
</div>

    
@endsection
