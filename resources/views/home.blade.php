
{{-- @extends('layouts.app') --}}
@section('content')
@extends('layouts.header')
@include('sweetalert::alert')


<div class="row">
    <div class="col-xl-8 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-danger text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cube-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">My published Blog</h6>
                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center"><i class="ion-plus-circled"> Add New Blog </i></button>
            </div>
            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-default">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Full Contet</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                {{Session::get('id')}}
                                <?php $aa=0?>
                            @foreach ($dat as  $valu)

                
                              <tr>
                                <th scope="row">{{++$aa}} </th>
                                <td>
                                    
                                    <img src='/image/{{ $valu->picture }}' width="100px"  height='90px'>
                                
                                </td>  
                                <td>{{$valu->title}}</td>
                                <td>{{$valu->content}}</td>
                                <td width='150'>
                                        <form action="{{ route('delete',$valu->id )}}" method="POST">  
                                        
                                            @csrf

                                            @method('DELETE')
                        
                              
                        
                                            <button type="submit" onclick='return confirm("Are you sure you want to delete this item?")' class="btn btn-danger"><i class="ion-close-circled"></i></button>
                                            <a class="btn btn-primary" href=""><i class="ion-compose"></i></a>

                                    </form>
                                   
                                </td>
                            </tr>
                        </tbody>
                                  
                              @endforeach
                               
                        </table>
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
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Article  Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
             <form action="{{'registerArticle'}}" method='POST'  enctype="multipart/form-data">
               
            @csrf
              <div class="form-group">
               <label>Title</label>
               <div>
                <input  type='hidden'  name='user_id' value="{{Auth::user()->id}}">
                   <textarea  class="form-control" rows="2"  name='title'></textarea>
                   <span class="text-danger">@error('title'){{$message.old('title')}}
                    @enderror</span>
               </div>
            </div>
                 <div class="form-group">
                     <label>Content</label>
                     <div>
                         <textarea required class="form-control" rows="4" name='content'></textarea>
                         <span class="text-danger">@error('content'){{$message.old('content')}}</span>
                            @enderror</span>
                     </div>
                 </div>

                 <div class="form-group">
                    <label>Content Picture</label>
                    <div>
                        <input type='file' name='picture'class='form-cotroller' >
                        <span class="text-danger">@error('picture'){{$message.old('picture')}}</span>
                           @enderror</span>
                    </div>
                </div>
                 <div class="form-group">
                     <div>
                         <button type="submit" class="btn btn-primary waves-effect waves-light">
                             <i class="fa fa-save" aria-hidden="true">Save</i>
                         </button>
                         <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                             Cancel
                         </button>
                     </div>
                 </div>
             </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
