@extends("layouts.header")
@section('content')
@include('sweetalert::alert')
 
<div class="row">
 <div class="col-lg-10">
     <div class="card m-b-30">
         <div class="card-body">

             <h4 class="mt-0 header-title">Article  Registration</h4>
             <form action="{{'registerArticle'}}" method='POST'>
                @if(Session::get('success'))
         <div class='alert alert-success'>
          {{
           Session::get('success','default');
          }}

          @endif
         </dv>
          @if(Session::get('fail'))
          <div class='alert alert-danger'>
          
            {{Session::get('fail')}}
           
         </div>
         @endif
         @csrf
              <div class="form-group">
               <label>Title</label>
               <div>
                <input  type='hidden' value='12' name='user_id'>
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
                     <div>
                         <button type="submit" class="btn btn-primary waves-effect waves-light">
                             Submit
                         </button>
                         <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                             Cancel
                         </button>
                     </div>
                 </div>
             </form>

         </div>
     </div>
 </div> <!-- end col -->
</div>


@endsection
