@extends('layouts.style')

@section('content')

<section class="main-content">
 
    <div class="container justify-content-center">
        
        <div class="row">
       
        
            <div class="col-sm-8 col-md-8 col-lg-8">
            @foreach($query as $user)
                <div class="food-card food-card--vertical">
                    <div class="food-card_img">
                        <img src="{{ asset('public/images/' . $user->image) }}" alt="">
                        <a href="#!"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="food-card_content">
                        <div class="food-card_title-section">
                            <a href="#!" class="food-card_title">{{$user->title}}</a>
                            <a href="#!" class="food-card_author">{{$user->description}}</a>
                        </div>
                        <div class="food-card_bottom-section">
                            <div class="space-between">
                                <div>
                                    <span class="fa fa-fire"></span>Posted {{$user->created_at->diffForHumans()}}
                                </div>
                                <div class="pull-right">
                                    <span class="badge badge-success">Veg</span>
                                </div>
                            </div>
                            <hr>
                            <div class="space-between">
                                <div class="food-card_price">
                                    <span><form action="{{ route('like.post', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button>
                                                                like {{ $user->likeCount }}
                                                            </button>
                                                        </form>
</span>
                                </div>
                                <div class="food-card_order-count">
                                    <div class="input-group mb-3">
                                    <button>Read more</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            


            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="food-card"><br>
                <h3 class="text-center text-uppercase">Add An Article </h3>
                <br><br>

                <form method="POST" action="{{url('form1')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><b>{{ __('Title') }}</b></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><b>{{ __('Description') }}</b></label>

                            <div class="col-md-6">
                                <textarea id="name" type="text" rows="5" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </textarea>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><b>{{ __('Insert Image') }}</b></label>

                            <div class="col-md-6">
                        <input type="file" name="image" placeholder="Choose image" id="image" required>
                    
                        
</div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4"><br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Article') }}
                                </button>
                            </div>
                        </div>
                    </form>

                   
                </div>
            </div>


        </div>
        
        
    </div>
</section>
                            <script type='text/javascript'></script>
    

      

  
        
                   






               @endsection
