@extends('files.includes.main')
@section ('content')

<div class="row">
    <div class="col-12">
        <h4 class="m-t-20 m-b-30">Blogs</h4>
        <div class="card-columns">
            @foreach($results as $result)
                <div class="card m-b-30">
                    <img class="card-img-top img-fluid" style="height:250px" src="{{asset($result->image)}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title font-20 mt-0">{{ $result->title }}</h4>
                        <p class="card-text"><?php echo substr($result->content, 0, 100 )."..."; ?></p>                        
                        <p class="card-text">
                            <a href="{{ route('view.blog') }}/{{ $result->id }}"><small class="text-muted">Read More</small></a>
                            <?php
                            if ($result->user_id==Auth::id()){
                                ?>
                                <a href="{{ route('blog.form') }}/{{ $result->id }}" class="float-right"><small class="text-muted">Edit</small></a>
                                <?php
                            }
                            ?>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection