@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('User Information') }}</h3></div>

                <div class="card-body">
                    
                    <table border="0" cellpadding="7px;">
                        <tr>
                            <td rowspan="3" width="130px;"><img width="120px" height="130px" src="{{ $user->profile }}" alt="profile"></td>
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
                                <a href="{{ route('userEdit', $user->id) }}"><center><button class="btn btn-info">Change Information</button></center></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
