<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ trans('app.title') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>


 <!-- Right Side Of Navbar -->
         <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @php $locale = session()->get('locale'); @endphp
                        <li class="nav-item dropdown">
                           
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="lang/en"><img src="{{asset('img/us.png')}}" width="30px" height="20x"> English</a>
                                <a class="dropdown-item" href="lang/hn"><img src="{{asset('img/in.png')}}" width="30px" height="20x"> Hindi</a>
                                <a class="dropdown-item" href="lang/pk"><img src="{{asset('img/pk.png')}}" width="30px" height="20x"> Urdu</a>
                            </div>
                        </li>
                    </ul>

        <div class="flex-center position-ref full-height">
	           
	 @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">@lang("Login")</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __("Register")}}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="container text-center">
                        <h1>@lang("Hi there!")</h1>
                        <div class="col-md-offset-2">
                            <p>{{ __("How are you doing?")}}</p>
                            <p>{{ __("This is basic example of how you use Laravel Localizations")}}</p>
                        </div>
                    </div>

               
            </div>
        </div>
    </body>
</html>
