<!DOCTYPE html>
 <head> 
    <style>
        .regform{
            margin:15rem;
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
        </style>
 </head>    
<body>
        <form class="regform" action="{{route('create')}}" method="POST" enctype="multipart/form-data">
            @if(Session::has('user'))
            <div style="color:green;">
              <div style="padding-left:40rem;margin-top:-50px;"> <b>{{Session::get('user')}}<b></div>
            @endif
           
        <h2>Create a new blog</h2>
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
        
            
       
            
        

            


        
