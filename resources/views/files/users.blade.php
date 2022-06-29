@extends('files.includes.main')
@section ('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">All Users</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile Picture & Follower</th>
                        <th>Registered Date</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td><a href="{{ route('blog.read') }}/{{ $result->id }}"> {{ $result->name }}</a></td>
                            <td>{{ $result->email }}</td>
                            <td>
                                @if ($result->profile=="null")
                                    <img src="{{asset('assets/images/users/user-1.jpg')}}" width="50" height="50" alt="">
                                @else
                                    <img src="{{asset($result->profile)}}" width="50" height="50" alt="">
                                @endif
                                    <span>Followers: {{DB::table("followers")->where('follower', $result->id)->count()}}</span>
                                @if (Auth::id()!=$result->id)
                                    @if (DB::table('followers')->where('followee', Auth::id())->where('follower', $result->id)->count()==1)
                                        &nbsp;&nbsp;<a href="{{ route('user.follow',$result->id)}}"><button&nbsp; class="btn btn-danger float-right">Unfollow</button></a>
                                    @else
                                        &nbsp;&nbsp;<a href="{{ route('user.follow',$result->id)}}"><button&nbsp; class="btn btn-success float-right">Follow</button></a>
                                    @endif
                                @endif
                            </td>
                            <td>{{ $result->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection