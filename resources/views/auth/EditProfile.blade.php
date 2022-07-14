
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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
        <li ><a href="dashbroad">Dashboard</a></li>
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
        <li><a href="{{route('users')}}">All Users</a></li>
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
        <h4>Add New Post</h4>
        <p>Manage your contents</p>
      </div>
     
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
           
            <form action="{{ route('login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <div class="row">
                    <img src="/storage/img/user.png" alt="" width="150" style="border-radius: 50%">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="col-6">
                                <button>Change</button>
                            </div>
                        </div>
                        <br><br>
                    </div>
                    <input type="file" class="form-control  @error('image') border border-danger  @enderror" id="image" name="image" aria-describedby="imageHelp" placeholder="Enter image" value="{{old('image')}}" style="display: none">
                    @error('image')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="firstname" class="form-control  @error('firstname') border border-danger  @enderror" id="firstname" name="firstname" aria-describedby="firstnameHelp" placeholder="Enter firstname" value="{{old('firstname')}} {{auth()->user()->firstname}}">
                    @error('firstname')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control  @error('lastname') border border-danger  @enderror" id="lastname" name="lastname" placeholder="lastname" value="{{auth()->user()->lastname}}">
                    @error('lastname')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control  @error('username') border border-danger  @enderror" id="username" name="username" placeholder="username" value="{{auth()->user()->username}}">
                    @error('username')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Update</button>
                </div>
            </form>
            
            
          </div>
        </div>
      
      </div>
    </div>
  </div>
</div>

</body>
</html>

