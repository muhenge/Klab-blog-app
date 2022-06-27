@extends('files.includes.main')
@section ('content')

<div class="row">
    
<div class="col-md-8 col-xl-8">
            
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="card-title font-20 mt-0">{{ $results->title }}</h4>
        </div>
        <img class="rounded" src="{{asset($results->image)}}" alt="Card image cap" height="400">
        <div class="card-body">
            <p class="card-text"><?php echo $results->content; ?></p>
            <a href="#" class="card-link">{{ $results->created_at }}</a>
        </div>
    </div>

</div><!-- end col -->
</div>

@endsection