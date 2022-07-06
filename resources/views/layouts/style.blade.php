<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Relationships Assignment</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - GoSNippets</title>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
                                <style>@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap);

body {
    background: linear-gradient(147deg,#74b486 0%, #74b486 74%);

    font-family: "roboto", sans-serif;
}


.p-4 {
    padding: 1.5rem!important;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}
.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
}    
}
/* user-dashboard-info-box */
.user-dashboard-info-box .candidates-list .thumb {
    margin-right: 20px;
}
.user-dashboard-info-box .candidates-list .thumb img {
    width: 80px;
    height: 80px;
    -o-object-fit: cover;
    object-fit: cover;
    overflow: hidden;
    border-radius: 50%;
}

.user-dashboard-info-box .title {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 30px 0;
}

.user-dashboard-info-box .candidates-list td {
    vertical-align: middle;
}

.user-dashboard-info-box td li {
    margin: 0 4px;
}

.user-dashboard-info-box .table thead th {
    border-bottom: none;
}

.table.manage-candidates-top th {
    border: 0;
}

.user-dashboard-info-box .candidate-list-favourite-time .candidate-list-favourite {
    margin-bottom: 10px;
}

.table.manage-candidates-top {
    min-width: 650px;
}

.user-dashboard-info-box .candidate-list-details ul {
    color: #969696;
}

/* Candidate List */
.candidate-list {
    background: #ffffff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    border-bottom: 1px solid #eeeeee;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 20px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.candidate-list:hover {
    -webkit-box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
    box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
    position: relative;
    z-index: 99;
}
.candidate-list:hover a.candidate-list-favourite {
    color: #e74c3c;
    -webkit-box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
    box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
}

.candidate-list .candidate-list-image {
    margin-right: 25px;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 80px;
    flex: 0 0 80px;
    border: none;
}
.candidate-list .candidate-list-image img {
    width: 80px;
    height: 80px;
    -o-object-fit: cover;
    object-fit: cover;
}

.candidate-list-title {
    margin-bottom: 5px;
}

.candidate-list-details ul {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-bottom: 0px;
}
.candidate-list-details ul li {
    margin: 5px 10px 5px 0px;
    font-size: 13px;
}

.candidate-list .candidate-list-favourite-time {
    margin-left: auto;
    text-align: center;
    font-size: 13px;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 90px;
    flex: 0 0 90px;
}
.candidate-list .candidate-list-favourite-time span {
    display: block;
    margin: 0 auto;
}
.candidate-list .candidate-list-favourite-time .candidate-list-favourite {
    display: inline-block;
    position: relative;
    height: 40px;
    width: 40px;
    line-height: 40px;
    border: 1px solid #eeeeee;
    border-radius: 100%;
    text-align: center;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    margin-bottom: 20px;
    font-size: 16px;
    color: #646f79;
}
.candidate-list .candidate-list-favourite-time .candidate-list-favourite:hover {
    background: #ffffff;
    color: #e74c3c;
}

.candidate-banner .candidate-list:hover {
    position: inherit;
    -webkit-box-shadow: inherit;
    box-shadow: inherit;
    z-index: inherit;
}

.bg-white {
    background-color: #ffffff !important;
}
.p-4 {
    padding: 1.5rem!important;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}
.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
}

.user-dashboard-info-box .candidates-list .thumb {
    margin-right: 20px;
}

.main-content {
    padding-top: 3px;
    padding-bottom: 100px;
}

a {
    text-decoration: none;
}

.food-card {
    background: #fff;
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 30px;
    -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
    -webkit-transition: 0.1s;
    transition: 0.1s;
}

.food-card:hover {
    -webkit-box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.food-card .food-card_img {
    display: block;
    position: relative;
}

.food-card .food-card_img img {
    width: 100%;
    height: 200px;
    -o-object-fit: cover;
    object-fit: cover;
}

.food-card .food-card_img i {
    position: absolute;
    top: 20px;
    right: 30px;
    color: #fff;
    font-size: 25px;
    -webkit-transition: all 0.1s;
    transition: all 0.1s;
}

.food-card .food-card_img i:hover {
    top: 18px;
    right: 28px;
    font-size: 29px;
}

.food-card .food-card_content {
    padding: 15px;
}

.food-card .food-card_content .food-card_title-section {
    height: 100px;
    overflow: hidden;
}

.food-card .food-card_content .food-card_title-section .food-card_title {
    font-size: 24px;
    color: #333;
    font-weight: 500;
    display: block;
    line-height: 1.3;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.food-card .food-card_content .food-card_title-section .food-card_author {
    font-size: 15px;
    display: block;
}

.food-card .food-card_content .food-card_bottom-section .space-between {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers {
    margin-left: 17px;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers img,
.food-card .food-card_content .food-card_bottom-section .food-card_subscribers .food-card_subscribers-count {
    height: 45px;
    width: 45px;
    border-radius: 45px;
    border: 3px solid #fff;
    margin-left: -17px;
    float: left;
    background: #f5f5f5;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers .food-card_subscribers-count {
    position: relative;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers .food-card_subscribers-count span {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    font-size: 13px;
}

.food-card .food-card_content .food-card_bottom-section .food-card_price {
    font-size: 16px;
    font-weight: 300;
    color: #F47A00;
}

.food-card .food-card_content .food-card_bottom-section .food-card_order-count {
    width: 130px;
}

.food-card .food-card_content .food-card_bottom-section .food-card_order-count input {
    background: #f5f5f5;
    border-color: #f5f5f5;
    -webkit-box-shadow: none;
    box-shadow: none;
    text-align: center;
}

.food-card .food-card_content .food-card_bottom-section .food-card_order-count button {
    display: inline-flex;
    padding: 8px 12px;
    border: none;
    font-size: 10px;
    text-transform: uppercase;
    color: #fff0e6;
    font-weight: 600;
    letter-spacing: 1px;
    border-radius: 50px;
    cursor: pointer;
    outline: none;
    border: 1px solid #fd3535;
    background: linear-gradient(147deg, #14301c 0%, #14301c 74%);
}

@media (min-width: 992px) {
    .food-card--vertical {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: relative;
        height: 235px;
    }

    .food-card--vertical .food-card_img img {
        width: 200px;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }


    .db-social .jumbotron {
    margin: 0;
    background: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-position: bottom center;
    color: #fff!important;
    height: 300px;
    position: relative;
    box-shadow: inset 0 0 20px rgba(0,0,0,.3);
    padding: 0;
}

.container-fluid {
    padding: 30px 30px;
}

.db-social .head-profile {
    margin-top: -120px;
    border-radius: 4px;
    position: relative;
}

.widget {
    background: #fff;
    border-radius: 0;
    border: none;
    margin-bottom: 30px;
}
.has-shadow {
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
}
.db-social .head-profile:before {
    content: "";
    background: rgba(255,255,255,.6);
    height: 20px;
    width: 90%;
    position: absolute;
    top: -20px;
    left: 0;
    right: 0;
    margin: 0 auto;
    border-radius: 4px 4px 0 0;
}
.db-social .head-profile:after {
    content: "";
    background: rgba(255,255,255,.3);
    height: 20px;
    width: 80%;
    position: absolute;
    top: -40px;
    left: 0;
    right: 0;
    margin: 0 auto;
    border-radius: 4px 4px 0 0;
}
.db-social .widget-body {
    padding: 1rem 1.4rem;
}
.widget-body {
    padding: 1.4rem;
}
.pb-0, .py-0 {
    padding-bottom: 0!important;
}
.db-social .image-default img {
    width: 120px;
    position: absolute;
    top: -80px;
    left: 0;
    right: 0;
    margin: 0 auto;
    box-shadow: 0 0 0 6px rgba(255,255,255,1);
    z-index: 10;
}
.db-social .infos {
    text-align: center;
    margin-top: 4rem;
    margin-bottom: 1rem;
    line-height: 1.8rem;
}
.db-social h2 {
    color: #2c304d;
    font-size: 1.6rem;
    font-weight: 600;
    margin-bottom: .2rem;
}
.db-social .location {
    color: #aea9c3;
    font-size: 1rem;
}
.db-social .follow .btn {
    padding: 10px 30px;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn-shadow, .btn-shadow a {
    color: #5d5386;
    background-color: #fff;
    border-color: #fff;
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.15);
}
.db-social .head-profile .actions {
    display: inline-block;
    vertical-align: middle;
    margin-left: .5rem;
}
.actions {
    z-index: 999;
    display: block;
}
.actions.dark .dropdown-toggle {
    color: #2c304d;
}
.actions .dropdown-toggle {
    color: #98a8b4;
    background: none;
    border: none;
    padding: 0;
    font-size: 1.7rem;
}
.actions .dropdown-menu {
    border: none;
    min-width: auto;
    font-size: 1rem;
    border-radius: 4px;
    padding: 1.4rem 1.8rem;
    text-align: left;
    box-shadow: 1px 1px 30px rgba(0,0,0,.15);
}

.actions .dropdown-menu .dropdown-item {
    padding: .5rem 0;
}
.actions .dropdown-menu a {
    color: #2c304d;
    font-weight: 500;
}

.db-social .head-profile li:first-child {
    padding-left: 0;
}
.db-social .head-profile li {
    display: inline-block;
    text-align: center;
    padding: 0 1rem;
}
.db-social .head-profile li .counter {
    color: #2c304d;
    font-size: 1.4rem;
    font-weight: 600;
}
.db-social .head-profile li .heading {
    color: #aea9c3;
    font-size: 1rem;
}
}

</style>

<script type='text/javascript' src=''></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>

</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ __('KLab TechupSkills') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/home') }}"><b>{{ __('Home') }}</b></a>
                                </li>
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ url('addpost') }}"><b>{{ __('Create an article') }}</b></a>
                                </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
