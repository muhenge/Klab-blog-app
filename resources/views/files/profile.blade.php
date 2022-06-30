@extends('files.includes.main')
@section ('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card m-b-30"> 
            <div class="card-body  text-success">

                <h4 class="mt-0 header-title text-primary border-bottom">Change Password</h4>

                <form  action="{{ route('user.password') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" id="old" name="entered" class="form-control" required/>
                        <input type="hidden" id="entered" name="old" value="<?=Auth::user()->password?>" class="form-control" required placeholder="Type something"/>
                        <span style="color:red;">@error('entered'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <div>
                            <input type="password" name="password" class="form-control" required
                                    placeholder="New Password" id="password"/>
                                    <span style="color:red;">@error('password'){{$message}}@enderror</span>
                        </div>
                        <label>Comfirm Password</label>
                        <div class="m-t-10">
                            <input type="password" class="form-control" name="confirm_password" required
                                    id="confirm_password"
                                    placeholder="Re-Type Password"/>
                                    <span style="color:red;">@error('confirm_password'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-secondary waves-effect waves-light bg-primary">
                                Change Information
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

    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-body text-warning">

                <h4 class="mt-0 header-title  text-primary border-bottom">Change user Information</h4>
                

                <form  action="{{ route('user.setting2') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <lebel class="col-sm-4 col-form-label">
                            @if (Auth::user()->profile=="null")
                                <img class="rounded-circle" width="200" height="200" src="{{asset('assets/images/users/user-1.jpg')}}" alt="">
                            @elseif(Auth::user()->profile!="null")
                                <img class="rounded-circle" width="200" height="200" src="{{Auth::user()->profile}}" alt="">
                            @endif
                        </lebel>
                        <div class="col-sm-8">
                            <input type="file" name="image" id="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>E_mail</label>
                        <div>
                            <input type="text" name="email" value="<?=Auth::user()->email?>" class="form-control" required/>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div>
                        <button type="submit" class="btn btn-success waves-effect waves-light bg-primary">Change</button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection