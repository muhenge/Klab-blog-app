<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>K-lab Blog-App</title>
</head>

<body>
    
    <nav style="background:rgb(98, 98, 98);" class=" p-4 mb-5  d-flex justify-content-between ">
        <ul class="d-flex text-center nav text-black">
            <li class="">
            <a href="/" style="text-decoration: none; color: rgb(255, 255, 255);" class="p-1 ">VIEW ALL BLOGS</a>
            </li>
            @auth
            <li class="">
                <a href="{{ route('dashbroad')}}" style="text-decoration: none; color: rgb(255, 255, 255);" class="p-3 ">ADD NEW</a>
            </li>
            @endauth
        </ul>
        <ul class="d-flex text-center nav">
            @auth
            <li class="">
                <a href="{{route('userProfile',auth()->user()->id)}}" class="p-3 "><button class="btn btn-primary"><i class="fa fa-fw fa-user"></i>{{ auth()->user()->username}}</button></a>
            </li>
           
            @endauth

            @guest
            
            <li class="pl-3">
                <a href="{{ route('login')}}" class=" btn btn-secondary ">Sign In</a>
            </li>
            <li class="pl-3">
                <a href="{{ route('register')}}" class=" btn btn-primary ">Sign Up</a>
            </li>
            @endguest
        </ul>
    </nav>
    @yield('content')

    
</body>

</html>