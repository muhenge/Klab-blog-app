@section('content')
@extends('layouts.header')
@include('sweetalert::alert')

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Modal Heading</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update1')}}" method="POST"  enctype="multipart/form-data">
               
                    @csrf
                    
                         <div class="form-group">
                             <label>name</label>
                             <div>
                                <input type='text' name='name' class="form-control"  value="{{Auth::user()->name}}" readonly>
                                <span class="text-danger">@error('picture'){{$message.old('picture')}}</span>
                                   @enderror</span>
                             </div>
                         </div>
                         <div class="form-group">
                            <label>Email</label>
                            <div>
                               <input type='text' name='name' class="form-control"  value="{{Auth::user()->email}}" readonly>
                               <span class="text-danger">@error('picture'){{$message.old('picture')}}</span>
                                  @enderror</span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label>Content Picture</label>
                            <div>
                                <input type='file' name='picture' class="form-control" >
                                <span class="text-danger">@error('picture'){{$message.old('picture')}}</span>
                                   @enderror</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <img src="/image/{{Auth::user() ->picture }}" alt="user" class="rounded-circle" height="80"></div>
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

<div class="row">
 <div class="col-12">
     <div class="card m-b-30">
         <div class="card-body">

          <div class="table-responsive">
           <table class="table mb-0">
               <thead class="thead-default">
                   <tr>
                       <th>#</th>
                       <th>profile</th>
                       <th>name</th>
                       <th>email</th><th>Action</th>
                   </tr>
               </thead>
               <tbody>
                  
                   {{Session::get('id')}}
                   <?php $ii=0?>
               @foreach ($aa as  $valu)

   
                 <tr>
                   <th scope="row">{{++$ii}} </th>
                   <td>
                       
                    <button type="button"  onmouseout="mouseout()" class=" btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal"> <img src='/image/{{ $valu->picture }}' width="100px"  height='90px'></button>
                   
                   </td>  
                   <td>{{$valu->name}}</td>
                   <td>{{$valu->email}}</td>
                   <td width='150'>
                           <form action="" method="POST">  
                           
                               @csrf

                               @method('DELETE')
           
                 
           
                               <button type="submit" onclick='return confirm("Are you sure you want to delete this item?")' class="btn btn-success"><i class=" mdi mdi-checkbox-marked-circle"></i></button>
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
 </div> <!-- end col -->
</div> <!-- end row -->
<!--Summernote js-->
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js') }}"></script>

<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });
    function  mouseoutevent(){
     alert('Mouseoute')

    }
</script>
@endsection
