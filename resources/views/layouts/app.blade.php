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
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800");
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  /* display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  font-family: 'Fira Sans', sans-serif; */
  background: linear-gradient(147deg,#74b486 0%, #74b486 74%);
}
/* .blog-card{
  position: absolute;
  height: 370px;
  width: 95%;
  max-width: 850px;
  margin: auto;
  border-radius: 25px;
  background: white;
  box-shadow: 0px 10px 50px rgba(252,56,56,.3);
} */
/* .inner-part{
  position: absolute;
  display:
  height: 360px;
  align-items: center;
  justify-content: center;
  padding: 0 25px;
} */
#imgTap:checked ~ .inner-part {
  padding: 0;
  transition: .1s ease-in;
}
.inner-part .img{
  height: 33px;
  width: 33px;
  flex-shrink: 1;
 
  border-radius: 20px;
  box-shadow: 2px 3px 15px rgba(252,56,56,.1);
}
.postcard {
  flex-wrap: wrap;
  display: flex;
  
  box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
  border-radius: 10px;
  margin: 0 0 2rem 0;
  overflow: hidden;
  position: relative;
  color: #ffffff;

	&.dark {
		background-color: #18151f;
	}
	&.light {
		background-color: #e1e5ea;
	}
	
	.t-dark {
		color: #18151f;
	}
	
  a {
    color: inherit;
  }
	
	h1,	.h1 {
		margin-bottom: 0.5rem;
		font-weight: 500;
		line-height: 1.2;
	}
	
	.small {
		font-size: 80%;
	}

  .postcard__title {
    font-size: 1.75rem;
  }

  .postcard__img {
    max-height: 180px;
    width: 100%;
    object-fit: cover;
    position: relative;
  }

  .postcard__img_link {
    display: contents;
  }

  .postcard__bar {
    width: 50px;
    height: 10px;
    margin: 10px 0;
    border-radius: 5px;
    background-color: #424242;
    transition: width 0.2s ease;
  }

  .postcard__text {
    padding: 1.5rem;
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .postcard__preview-txt {
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: justify;
    height: 100%;
  }

  .postcard__tagbox {
    display: flex;
    flex-flow: row wrap;
    font-size: 14px;
    margin: 20px 0 0 0;
		padding: 0;
    justify-content: center;

    .tag__item {
      display: inline-block;
      background: rgba(83, 83, 83, 0.4);
      border-radius: 3px;
      padding: 2.5px 10px;
      margin: 0 5px 5px 0;
      cursor: default;
      user-select: none;
      transition: background-color 0.3s;

      &:hover {
        background: rgba(83, 83, 83, 0.8);
      }
    }
  }

  &:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(-70deg, #424242, transparent 50%);
    opacity: 1;
    border-radius: 10px;
  }

  &:hover .postcard__bar {
    width: 100px;
  }
}

@media screen and (min-width: 769px) {
  .postcard {
    flex-wrap: inherit;

    .postcard__title {
      font-size: 2rem;
    }

    .postcard__tagbox {
      justify-content: start;
    }

    .postcard__img {
      max-width: 300px;
      max-height: 100%;
      transition: transform 0.3s ease;
    }

    .postcard__text {
      padding: 3rem;
      width: 100%;
    }

    .media.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      background: #18151f;
      top: -20%;
      height: 130%;
      width: 55px;
    }

    &:hover .postcard__img {
      transform: scale(1.1);
    }

    &:nth-child(2n+1) {
      flex-direction: row;
    }

    &:nth-child(2n+0) {
      flex-direction: row-reverse;
    }

    &:nth-child(2n+1) .postcard__text::before {
      left: -12px !important;
      transform: rotate(4deg);
    }

    &:nth-child(2n+0) .postcard__text::before {
      right: -12px !important;
      transform: rotate(-4deg);
    }
  }
}
@media screen and (min-width: 1024px){
		.postcard__text {
      padding: 2rem 3.5rem;
    }
		
		.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      
      top: -20%;
      height: 130%;
      width: 55px;
    }
	
  .postcard.dark {
		.postcard__text:before {
			background: #18151f;
		}
  }
	.postcard.light {
		.postcard__text:before {
			background: #e1e5ea;
		}
  }
}
.img img{
  max-height: 180px;
    width: 30%;
    object-fit: cover;
    position: relative;
}

.content{
  padding: 2;
  width: 530px;
  margin-left: 50px;
  opacity: 1;
  transition: .6s;
}
#imgTap:checked ~ .inner-part .content{
  display: none;
}
#tap-1:checked ~ .inner-part .content-1,
#tap-2:checked ~ .inner-part .content-2,
#tap-3:checked ~ .inner-part .content-3{
  opacity: 1;
  margin-left: 0px;
  z-index: 100;
  transition-delay: .3s;
}
.content span{
  display: block;
  color: #7b7992;
  margin-bottom: 15px;
  font-size: 12px;
  font-weight: 500
}
.content .title{
  font-size: 19x;
  font-weight: 700;
  color: #0d0925;
  margin-bottom: 20px;
}
.content .text{
  color: #4e4a67;
  font-size: 14px;
  margin-bottom: 30px;
  line-height: 1.5em;
  text-align: justify;
}
.content button{
  display: inline-flex;
  padding: 15px 20px;
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
  background: linear-gradient(147deg, #14301c  0%, #14301c 74%);
}
.content button:hover{
  background: linear-gradient(147deg, #14301c 0%, #14301c 74%);
}

.jbutton{
  display: inline-flex;
  padding: 5px 10px;
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
  background: linear-gradient(147deg, #14301c  0%, #14301c 74%);
}
.inner-partd button:hover{
  background: linear-gradient(147deg, #14301c 0%, #14301c 74%);
}





    </style>
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
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
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
