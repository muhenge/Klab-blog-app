
{{-- @extends('layouts.app') --}}
@section('content')
@extends('layouts.header')
<div class="row">
    <div class="col-xl-6 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-danger text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cube-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">My Blogs</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                    <span class="badge badge-success"> +11% </span> <span class="ml-2 text-muted">All Blog</span>
                </div>
                <div class="mt-4 text-muted">
                    <div class="float-right">
                        <p class="m-0">viewed: 1325</p>
                    </div>
                    <h5 class="m-0">1456<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                    
                </div>
            </div>
        </div>
    </div>   
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-account-network float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">User Container</h6>
            </div>
            <div class="card-body">
                <ul>
                         <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"> <span> List of User </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                @foreach ($data as $value )
                                <ul class="list-unstyled">
                                    
                                    <form method="POST">  <a class="dropdown-item" href="{{ route('articleList',$value->id )}}">
                                        {{$value->name}}
                            
                                       @csrf
                                      @method('post') 
                                    
                                   </form></a>
                                    
                 
                                    @endforeach
                                    
                                </ul>
                            </li> 
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
