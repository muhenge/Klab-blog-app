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
                            @php 
                                $prodID= Crypt::encrypt($result->id); 
                            @endphpargument
                            <a href="{{ route('view.blog',$prodID) }}">Read More</a>
                            <?php
                            if ($result->user_id==Auth::id()){
                                $data = DB::connection('mysql2')->table("like")->where('blog', $result->id)->count();
                                ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('blog.lik') }}/{{ $result->id }}" class=""><i class="dripicons-thumbs-up"></i>&nbsp;<span class="text-muted"><?=$data?></span> </a>
                                <a href="{{ route('blog.form') }}/{{ $result->id }}" class="float-right"><small class="text-primary">Edit</small></a>
                                <?php
                            }else {
                                
                            $data = DB::connection('mysql2')->table("like")->where('blog', $result->id)->count();
                                ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('blog.lik') }}/{{ $result->id }}" class=""><i class="dripicons-thumbs-up"></i>&nbsp;<span class="text-muted"><?=$data?></span> </a>
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