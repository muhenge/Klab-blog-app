<!DOCTYPE html>
 <head> 
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@1,500&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        .regform{
            margin-top:0.5rem;
            margin-left:15rem;
            padding:4rem;
        }
        .formInput{
            background-color:beige;
            color:blue;
            margin-right:15.74rem;
            border:2px yellowgreen solid;
            border-radius: 10px;
            width:50rem;
        }
        label{
            font-size: 12;
            font-family: 'poppins',sans-serif;
            padding-left:50px;
            
        }
        input{ width:400px;
        height: 100px;
        background-color: beige;
        border:0px;
        border-radius: 10px;
        margin-left: 40px;}
        input:focus{
            border:0px;
            border-color: beige;
           
        }
        button{
            border:0px;
            height: 35px;
            font-weight:bold;
            width:104px; 
            background-color:whitesmoke;
            margin-left: 10rem;
            border-radius: 10px;;
        }
        button:hover{
                background-color: blue;
                color:white;
            }
            body {
                font-family: 'Nunito', sans-serif;}
            .bar {
            margin-left:40rem;
            padding-left:20px;
            display:flex;
           }
           .logout{
            margin-left:1rem;
           }
           
</style>
 </head>    
<body>
    <body class="antialiased">
        <div class="navbar-fixed">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mx-1/2">
                <div class="bar">
                <a class="navbar-brand" href="/">Home</a>
               
                @if (auth()->user())
                <a class="navbar-brand" href="/">Blog</a>
                <a href="/new" class="new" style="margin-top:10px;">Create a blog</a></div>
                <img src="{{ auth()->user()->profile}}" alt="no image found" width="30" height="30" style="margin-left:10px;border:1px white solid; border-radius:50%;"><a class="navbar-brand" href="/profile">{{ auth()->user()->name }}</a>
                    <form action="/logout" method="POST">
                        @csrf
                    <button type="submit" class="logout">logout</button>
                    </form>
                    @else
                    <a class="navbar-brand" href="/login">login</a>
                    <a href="/login" class="new" style="margin-top:10px;">Create a blog</a>
                    <a class="navbar-brand" href="/login">Blog</a>

                @endif
        </nav>
        </div>
        </div>
        <form class="regform" action="{{route('create')}}" method="POST" enctype="multipart/form-data">
            @if(Session::has('user'))
            <div style="color:green;">
              <div style="padding-left:40rem;margin-top:-50px;"> <b>{{ auth()->user()->name}}<b></div>
            @endif
           
        <h2 style="font-family: 'Abril Fatface', cursive;">Create a new blog</h2>
        @csrf
        <div class="formInput">
            <div>
            <label for="title">title</label><br>
            <input class="names" type="text" id="text" placeholder="enter your title" name="title">
            </div>
            <div style="color:red; padding-left:50px;">@error('title'){{$message}}@enderror</div><BR>
                <div>
            <label for="description">Description</label><br>
            <input class="names" type="text" id="description" placeholder="enter your blog description" name="Description">
                </div><div style="color:red; padding-left:50px;">@error('Description'){{$message}}@enderror</div>
                    <div><BR>
            <label for="names">Image</label><br>
            <input class="names" type="file" id="names" placeholder="file" name="image"/>
                    </div><br><div style="color:red; padding-left:50px;">@error('image'){{$message}}@enderror</div><div>
            <button class="button" type="submit">create blog</button>
                    </div><br>

        </div>
        </form>
        </body>
        </html>
        
            
       
            
        

            


        
