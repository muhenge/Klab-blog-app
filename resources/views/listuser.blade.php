@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Of Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    @guest
         <div class="inner-partd">
            <label for="imgTap" class="img">
            <img class="img-1" src="#">&nbsp;&nbsp;
            <span>{{ Auth::user()->name }}</span>
            </label>
            <div class="content content-1">
               
               <div class="title">
               <!-- {{$user->title}} -->
               </div>
               <div class="text">
               <!-- {{$user->description}} -->
               </div>
               <button>Read more</button>
            </div>
         </div>
         @endguest
        
         
      



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
