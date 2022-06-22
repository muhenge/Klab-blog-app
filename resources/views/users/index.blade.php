@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><h3 style="float:left">List of Users</h3>
                </div>

                <div class="card-body">
                   <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>N <sup>o</sup></th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php
                            $i=1;
                       @endphp
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                {{ $user->username }}
                            </td>
                        @empty
                        <tr>
                            <td colspan="2">
                                <center><h5 style="color:red; size:24px;">No user found in database.</h5></center>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                   </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
