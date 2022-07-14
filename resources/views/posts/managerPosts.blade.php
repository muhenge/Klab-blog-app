
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard Manage Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="/" style="text-decoration: none; color: rgb(98, 98, 98);" class="p-1 "><H4>VIEW ALL BLOGS</H4></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="{{route('dashbroad')}}">Dashboard</a></li>
        <li><a href="{{route('addPost')}}">Add New Post</a></li>
        <li><a href="{{route('manager')}}">Your Posts</a></li>
        @if(auth()->user()->role=='admin')
        <li><a href="{{route('users')}}">All Posts</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <a href="/" style="text-decoration: none; color: rgb(98, 98, 98);" class="p-1 "><H4>VIEW ALL BLOGS</H4></a>
      <ul class="nav nav-pills nav-stacked">
        <li ><a href="{{route('dashbroad')}}">Dashboard</a></li>
        <li><a href="{{route('addPost')}}">Add New Post</a></li>
        <li><a href="{{route('manager')}}">All Posts</a></li>
        @if(auth()->user()->role=='admin')
        <li><a href="{{route('users')}}">All User</a></li>
        @endif
        <li class="">
          <form action="{{route('logout')}}" method="post">
              @csrf
              <button type="submit" class="btn btn-danger" style="border: none;">Sign Out</button>
          </form>
      </li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Manage Posts</h4>
        <p>Manage your contents</p>
      </div>
     
      <div class="row">
        <div class="col-sm-12">
          <div class="well">

            @if($posts->count()>0)
            <table border="1" style="width: 100%" class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Auth</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        @foreach($users as $user)
                            @if($user->id===$post->user_id)
                                <td>{{$user->username}}</td>
                            @endif
                        @endforeach
                        <td><a href="{{ route('post', $post->id) }}" class="btn btn-primary">View</a> <a href="" class="btn btn-warning">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            
          </div>
        </div>
      
      </div>
    </div>
  </div>
</div>

</body>
</html>

