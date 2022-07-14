
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
        <li ><a href="">Dashboard</a></li>
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
        <li><a href="{{route('dashbroad')}}">Dashboard</a></li>
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

            <form action="{{ route('addPost')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" class="form-control @error('title') border border-danger  @enderror" id="title" aria-describedby="emailHelp" name="title" placeholder="Enter title" value="{{old('title')}}">
                    @error('title')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <textarea name="content" class="form-control  @error('content') border border-danger  @enderror" id="content" aria-describedby="emailHelp" placeholder="Enter content" rows="3"></textarea>
                    @error('content')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Cover image</label>
                    <input type="file" class="form-control  @error('email') border border-danger  @enderror" id="image" name="image" aria-describedby="emailHelp" value="{{old('email')}}">
                    @error('image')
                    <small class="mt-2 text-red-200" style="color:red">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Add</button>
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

