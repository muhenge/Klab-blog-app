@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Klab Blog</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('assets/images/20.png')}}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" />

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg">
            
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                
                                        <h3 class="text-center mt-0 m-b-15">
                                            <a href="#" class="logo logo-admin"><img src="assets/images/20.png" height="30" alt="logo"></a>
                                        </h3>
                
                                        
                
                                        <div class="p-2">
                                            <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                                                @csrf
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="email" required="" placeholder="test@example.com" name="email">
                                                    </div>
                                                </div>
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="password"  name='password' required="" placeholder="Password">
                                                    </div>
                                                </div>
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                                    </div>
                                                </div>
                
                                                <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-sm-7 m-t-20">
                                                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                    <div class="col-sm-5 m-t-20">
                                                        <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>

     <!-- jQuery  -->
     <script src="{{asset('assets/js/jquery.min.js')}}"></script>
     <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
     <script src="{{asset('assets/js/detect.js')}}"></script>
     <script src="{{asset('assets/js/fastclick.js')}}"></script>
     <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
     <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
     <script src="{{asset('assets/js/waves.js')}}"></script>
     <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
     <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>

     <!-- skycons -->
     <script src="{{asset('assets/plugins/skycons/skycons.min.js')}}"></script>

     <!-- dashboard -->
     <script src="{{asset('assets/pages/dashboard.js')}}"></script>

     <!-- App js -->
     <script src="{{asset('assets/js/app.js')}}"></script>
    </body>
</html>

@endsection
