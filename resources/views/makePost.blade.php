@extends('layouts.style')

@section('content')

<section class="main-content">
    <div class="container justify-content-center">
        <!-- <h1 class="text-center text-uppercase">Food Order Card</h1>
        <br>
        <br> -->
        
        @foreach($query as $user) 
            <div class="col-sm-8 col-md-8 col-lg-8">
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
                                    <span class="fa fa-fire"></span> {{$user->created_at->diffForHumans()}}
                                </div>
                                <div class="pull-right">
                                    <span class="badge badge-success">Veg</span>
                                </div>
                            </div>
                            <hr>
                            <div class="space-between">
                                <div class="food-card_price">
                                    <span>5.99$</span>
                                </div>
                                <div class="food-card_order-count">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary minus-btn" type="button" id="button-addon1"><i class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="text" class="form-control input-manulator" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="0">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary add-btn" type="button" id="button-addon1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
                            <script type='text/javascript'></script>


@endsection