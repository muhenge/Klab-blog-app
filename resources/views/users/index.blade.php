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
                            <th>Profile</th>
                            <th>Follow</th>
                        </tr>
                    </thead>
                    <tbody>
                       @php
                            $i=1;
                       @endphp
                        @forelse ($users as $user)
                        
                            <tr style="cursor: pointer;">
                                <td>{{ $i }}</td>
                                <td>
                                    <a style="text-decoration: none; color:black" href="{{ route('articleTitle', $user->id) }}">
                                    {{ $user->username }}
                                </a>
                                </td>
                                <td>
                                    @if ($user->profile != 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpCKq1XnPYYDaUIlwlsvmLPZ-9-rdK28RToA&usqp=CAU')
                                <img width="70px" height="70px" src="/images/{{ $user->profile }}" alt="profile">
                            @else
                            <img width="70px" height="70px" src="{{ $user->profile }}" alt="profile">
                            @endif
                                </td>
                                <td>
                                    <a href="{{ route('followIndex', $user->id) }}" class="btn btn-primary">Follow</a>
                                </td>
                                @php
                                    $i++
                                @endphp
                            </tr>
                        
                        @empty
                        <tr>
                            <td colspan="4">
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
