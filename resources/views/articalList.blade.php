@extends('layout.layout')
@section('content')
{{Session::get('msg')}}
  <div class="artical-list">
    <ul>
            @foreach ($articals as $artical)
                {{$artical}}
            @endforeach
    </ul>
</div>  
@endsection