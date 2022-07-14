<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Posty</title>
</head>

<body class="bg-skyblue">
    <nav class="p-4 mb-5  d-flex justify-content-center text-red-200 " style="background-color:#53bb50;color:red; font-size:20px">
        <ul class="d-flex text-center nav text-white">
            <li class="">
                <a href="/" class="p-3 ">Home</a>
            </li>
            @auth
            <!-- <li class="">
                <a href="{{ route('dashbroad')}}" class="p-6 ">Dashbroad</a>
            </li> -->
            @endauth
        </ul>
        <ul class="d-flex text-center nav">
            @auth
            <li class="">
                <a href="{{route('userProfile',auth()->user()->id)}}" class="p-3 ">{{ auth()->user()->username}}</a>
            </li>
            <li class="">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="inline" style="border: none; background-color:#66b364;color:white">Logout</button>
                </form>
            </li>
            @endauth

            @guest
            <li class="">
                <a href="{{ route('login')}}" class="p-3 ">Login</a>
            </li>
            <li class="">
                <a href="{{ route('register')}}" class="p-3 ">Regist</a>
            </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>

</html>