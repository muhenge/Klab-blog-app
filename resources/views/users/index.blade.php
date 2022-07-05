@extends('layouts.app')
@php
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Validator;
    Use App\Models\Follow;
    use Illuminate\Support\Facades\Crypt;
@endphp
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
                                    <a style="text-decoration: none; color:black" href="{{ route('articleTitle', Crypt::encryptString($user->id)) }}">
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
                                    @php
                                         $user_id = Auth()->user()->id;
                                         $user_follow = Follow::all()->where('user1_id', $user_id)->where('user2_id', $user->id)->where('follow', 1);
                                         $follow_id = DB::table('follows')->select('id')->where('user1_id', $user_id)->where('user2_id', $user->id)->where('follow', 1)->get();
                                        $user_count = collect($user_follow)->count();
                                    @endphp
                                    @if ($user_count == 1)
                                    @forelse ($follow_id as $follow_idd)
                                    <a href="{{ route('unfollowIndex', $follow_idd->id) }}" class="btn btn-danger">Unfollow</a>
                                    @empty
                                    @endforelse
                                    @else
                                    <a href="{{ route('followIndex', $user->id) }}" class="btn btn-primary">Follow</a>
                                    @endif
                                </td>
                                @php
                                    $i++
                                @endphp
                            </tr>
                        
                        @empty
                        <tr>
                            <td colspan="4">
                                <center><h5 style="color:red; size:24px;">No other user found in database.</h5></center>
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
