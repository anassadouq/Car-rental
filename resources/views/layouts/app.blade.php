<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Location</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body style="background-color:#E8E8E8">
        <div class="row">
            <div class="col-2 bg-dark text-light">
                <ul type="none">
                    <li class="nav-item">
                        <a href="/" class="nav-link my-4">
                            <span class="material-symbols-outlined">table</span>    
                            TABLEAU DE BORD
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-4" href="/client">
                            <span class="material-symbols-outlined">person</span>    
                            CLIENTS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-4" href="/voiture"> 
                            <span class="material-symbols-outlined">directions_car</span>    
                            VOITURES
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-4" href="/reservation">
                            <span class="material-symbols-outlined">table_rows</span>    
                            RESERVATIONS
                        </a>
                    </li>
                </ul>

                <ul type="none">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link my-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <h5> 
                                    <span class="material-symbols-outlined">logout</span>
                                    {{ __('Logout') }}
                                </h5>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    @endguest
                </ul>
            </div>

            <div class="col-10">
                @yield('content')
            </div>
        </div>
    </body>
</html>