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
        input[type="file"]{
            border:0px;
            margin-left:40px;
            color:blueviolet;
        }
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
    
        
    
        <form class="regform" action="/update/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
        <h2 style="color:blue">Edit user Profile</h2>
    </div>
    
        <div class="formInput"><br>
            <div style="margin-left:40px;"> 
            <img src="{{ $user->profile}}" width="250" height="200" style="margin-top:10px; border:2px yellowgreen solid">
            </div>
            <div>
                <label for="names">Upload profile</label>
            <br>
            <div>
            <input  type="file"  name="profile" value="{{ $user->profile }}" style="margin-top:-10px;">
            </div>
            <br>
        <div>
            <label for="description">UserName</label>
        </div>
            <div>
            <input class="names" type="text" id="description"  name="name" value="{{ $user->name }}"><br>
        </div>
            <div>
            <label for="names">Email</label>
        </div>
            <div>
            <input class="names" type="email" id="names"  name="email" value="{{ $user->email }}">
        </div>
        <br>
            <button class="button" type="submit">update</button>
        </div><br>
        
    </div>
        </form>
        </body>
        </html>