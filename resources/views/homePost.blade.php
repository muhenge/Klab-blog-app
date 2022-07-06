@extends('layouts.style')

@section('content')

<section class="main-content">
 
    <div class="container justify-content-center">
        
        <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="food-card"><br>
                <h3 class="text-center text-uppercase">Enjoy to read </h3>
                <br><br>

                

                   
                </div>
            </div>
       
        
            <div class="col-sm-12 col-md-12 col-lg-12">
              
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
                                    <span><form action="{{ route('like.post', Crypt::encrypt($user->id)) }}"
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
                                    <form action="{{ route('like.post', $user->id) }}"
                                                            method="post">
                                    <button>Read more</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            


            


        </div>
        
        
    </div>
</section>
                            <script type='text/javascript'></script>
    

      

  
        
                   






               @endsection
