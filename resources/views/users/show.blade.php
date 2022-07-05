@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('User Information') }}</h3></div>

                <div class="card-body">
                    
                    <table border="0" cellpadding="7px;">
                        @if (session('success'))
                        <tr><td colspan="3">
                           <div class="alert bg-green">
                                     {{ session('success') }}
                                   </div>
                        </td></tr>
                             @endif
                             @if (session('danger'))
                        <tr>
                        <td colspan="3">
                            <div class="alert bg-red">
                                {{ session('danger') }}
                                </div>
                        </td>
                        </tr>
                        @endif
                        <tr>
                            <td rowspan="3" width="130px;">
                                @if (Auth()->user()->profile != 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpCKq1XnPYYDaUIlwlsvmLPZ-9-rdK28RToA&usqp=CAU')
                                <img width="120px" height="130px" src="/images/{{ $user->profile }}" alt="profile">
                            @else
                            <img width="120px" height="130px" src="{{ $user->profile }}" alt="profile">
                            @endif
                            
                        </td>
                            <td><h4><b>Names</b></h4></td><td><h4>{{ $user->name }}</h4></td>
                        </tr>
                        <tr>
                            <td><h4><b>Username</b></h4></td><td><h4>{{ $user->username }}</h4></td>
                        </tr>
                        <tr>
                            <td><h4><b>Email</b></h4></td><td><h4>{{ $user->email }}</h4></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                    <button type="button" class="btn btn-info col-12" data-toggle="modal" data-target="#modal-default">Change Profile</button>
                                {{-- <a href="{{ route('userEdit', Crypt::encryptString($user->id)) }}"><center><button class="btn btn-info">Change Information</button></center></a> --}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection







{{-- popup profile update --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Change Information</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('userUpdate',  Crypt::encryptString($user->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="form-group row has-success">
                    <label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">{{ __('Names') }}</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" required value="{{ $user->name }}" class="form-control form-control-success" id="inputHorizontalSuccess">
                    </div>
                </div>
                <div class="form-group row has-success">
                  
                    <label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">{{ __('Username') }}</label>
                  
                    <div class="col-sm-12">
                        <input type="text" name="username" required value="{{ $user->username }}" class="form-control form-control-success" id="inputHorizontalSuccess">
                    </div>
                </div>
                <div class="form-group row has-success">
                    <label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-12">
                        <input type="email" name="email" required value="{{ $user->email }}" class="form-control form-control-success" id="inputHorizontalSuccess">
                    </div>
                </div>
                <div class="form-group pass_show"> 
                            <input type="submit"  class="btn btn-info" value="Change" name="ChangeInfo" id="cp"> 
                        </div> 
            </form>
            
            <hr>
              
                <center><h3>Change password</h3></center>
            <form action="{{ route('changePassword',  Crypt::encryptString($user->id)) }}" method="POST" enctype="multipart/form-data">
              @csrf
            @method('put')
            <label>Current Password</label>
                  <div class="form-group pass_show"> 
                            <input type="password" required class="form-control" placeholder="Current Password" name="oldpsw"> 
                        </div> 
                    <label>New Password</label>
                        <div class="form-group pass_show"> 
                          <input class="form-control" required type="password"  id="pass1" name="newpsw" placeholder="Password">
                        </div> 
                    <label>Confirm Password</label>
                        <div class="form-group pass_show"> 
                            <input class="form-control" required type="password" id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm Password" name="conpsw">
                                                      <span id="confirmMessage"></span>
                        </div> 
                        <div class="form-group pass_show"> 
                            <input type="submit"  class="btn btn-info" value="Change Password" name="ChangePass" id="cp"> 
                        </div> 
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->






<script type="text/javascript">
    function checkPass()
  {
      //Store the password field objects into variables ...
      var pass1 = document.getElementById('pass1');
      var pass2 = document.getElementById('pass2');
      //Store the Confimation Message Object ...
      var message = document.getElementById('confirmMessage');
      //Set the colors we will be using ...
      var goodColor = "#66cc66";
      var badColor = "#ff6666";
      //Compare the values in the password field 
      //and the confirmation field
      if(pass1.value == pass2.value){
          //The passwords match. 
          //Set the color to the good color and inform
          //the user that they have entered the correct password 
          pass2.style.backgroundColor = goodColor;
          message.style.color = goodColor;
          message.innerHTML = "Passwords Match!"
          $('#cp').prop('disabled', false);
      }else{
          //The passwords do not match.
          //Set the color to the bad color and
          //notify the user.
          pass2.style.backgroundColor = badColor;
          message.style.color = badColor;
          message.innerHTML = "Passwords Do Not Match!"
          $('#cp').prop('disabled', true);
      }
  }  
  </script>