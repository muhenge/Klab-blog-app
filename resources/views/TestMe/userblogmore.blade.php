@section('content')
@extends('layouts.header')
@include('sweetalert::alert')
<div class="row">
 <div class="col-12">
     <div class="card m-b-30">
         <div class="card-body">
             <div class="row justify-content-center">
                 <div class="col-xl-5">
                     <div class="text-center mb-5">
                         <h4>Gustave Blogs are</h4>
                        
                     </div>
                 </div>
             </div>
             <div class="row justify-content-center">
                 <div class="col-xl-10">
                
                 

                     <div class="row">
                      <div class="col-lg-6"> <img  src='/image/{{$data->picture}}'width='300px' height='200px'></div>
                         <div class="col-lg-6">
                             <div class="faq-box mb-6">
                                 <div class="faq-ques rounded">
                                     <h6 class="pb-2"><i class="mdi mdi-help-circle text-primary mr-4 faq-icon"></i> {{$data->title}}</h6>
                                 </div>
                                 <p class="text-muted pt-2"> {{$data->content}}<span class="badge badge-success badge-pill"><i class="mdi mdi-hand-pointing-right" aria-hidden="true"></i></span>
                                    <span class="badge badge-danger badge-pill">0</span>
                                   </p>
                             </div>
                         </div>
                            
                     </div>
          
                 </div>
                 
             </div>
         </div>
     </div>
 </div>
</div>

@endsection