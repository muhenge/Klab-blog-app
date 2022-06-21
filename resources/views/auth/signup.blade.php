<!DOCTYPE html>
 <head> 
    <style>
        .regform{
            margin:15rem;
            padding:4rem;
        }
        .formInput{
            background-color:beige;
            color:crimson;
            margin-right:15.74rem;
            border:2px yellowgreen solid; solid;
            border-radius: 10px;
        }
        label{
            font-size: 12;
            font-family: 'poppins',sans-serif;
            color:blue;
            padding-left:20px;
            
        }
        input{ width:280px;
        height: 30px;
        background-color: beige;
        border:2px yellowgreen solid;
        border-radius: 10px;
        margin-left: 20px;}
        input:focus{
            border:0px;
            border-color: beige;
           
        }
        button{
            border:0px;
            height: 35px;
            width:104px; 
            background-color:crimson;
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
        <form class="regform" action="{{route('save')}}" method="POST">

            @if(Session::has('success'))
                <div style="color:yellowgreen;background-color:rgb(205, 184, 225);">
                    {{Session::get('success')}}
                    <h4><a href="login">login</a></h4>
                </div>
            
            @else
                <div style="color:crimson;">
                    {{Session::get('error')}}
                </div>
            
            @endif
            @csrf
        <h2 style="color:blue">Fill signup form</h2>
        
        <div class="formInput"><br><div>
            <label for="description">UserName</label>
        </div>
            <div>
            <input class="names" type="text" id="description" placeholder="enter your username" name="name" ><br>
        </div>
            <div>
            <label for="names">Email</label>
        </div>
            <div>
            <input class="names" type="email" id="names" placeholder="enter your email" name="email"><br>
        </div>
            <div>
            <label for="names">password</label>
        </div>
            <div>
            <input class="names" type="Password" id="names" placeholder="enter your password" name="password" ><br>
        </div>
            <div>
            <label for="names">ConfirmPassword</label>
        </div>
            <div>
            <input class="names" type="Password" id="names" placeholder="enter your password" name="confrimpassword" ><br>
        </div>
            <div><br>
            <button class="button" type="submit">signup</button>
        </div><br>
        @if($errors)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <h5>{{$error}}</h5>
                    @endforeach
             </ul>
            </div>
        @endif
    </div>
        </form>
        </body>
        </html>