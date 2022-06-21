<!DOCTYPE html>
 <head> 
    <style>
        .regform{
            background-color:bisque;
            margin:15rem;
            padding:4rem;
        }
        .formInput{
            background-color:beige;
            color:crimson;
            margin-right:15.74rem;
            border:2px blueviolet solid;
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
        border:0px;
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
        <form class="regform" action="{{route('check')}}" method="POST">
            @if(Session::has('error'))
            <div style="color:red;background-color:rgb(205, 184, 225);">
             <div style="padding:20px"> <h3> {{Session::get('error')}}</h3></div>
             @elseif(Session::has('errorer'))
             <div style="color:red;background-color:rgb(205, 184, 225);">
              <div style="padding:20px"> <h3> {{Session::get('errorer')}}</h3></div>
            @endif
            @csrf
        <h2 style="color:blue">Login form</h2>
        
        <div class="formInput"><br>
            <div>
            <label for="description">Email</label>
            <input class="names" type="email" id="description" placeholder="enter your description" name="email" /><BR>
                <div style="color:red; padding-left:20px;">@error('email'){{ $message }}@enderror</div>
            </div><br>
            <div>
            <label for="names">Password</label>
            <input class="names" type="Password" id="names" placeholder="enter your names" name="password" /><br>
            <div style="color:red; padding-left:20px;">@error('password'){{ $message }}@enderror</div>
            </div><br>
            <div>
            <button class="button" type="submit">login</button></div><br>
        </div>
        <h6>I don't have an account<a href="\signup">Signup</a></h6>
        </form>
        </body>
        </html>