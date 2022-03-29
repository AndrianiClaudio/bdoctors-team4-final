<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @yield('script')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            <div class="d-flex flex-column flex-shrink-0 bg-light side-sizes">
                {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                  <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                  <span class="fs-4">Sidebar</span></a>
                <hr> --}}

                <ul class="nav nav-pills flex-column mb-auto lh-5 fs-5">
                    <li class="nav-item">
                        <a href="{{ route('profile.show', $doctor->slug) }}" class="nav-link active"
                            aria-current="page">
                            <i class="fa-solid fa-user-doctor p-1"></i>
                            Il tuo profilo
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('messages.index', $doctor->slug) }}" class="nav-link link-dark">
                            <i class="fa-solid fa-comment-medical p-1"></i>
                            Messaggi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.show', $doctor->slug) }}" class="nav-link link-dark">
                            <i class="fa-regular fa-star p-1"></i>
                            Piani di abbonamento
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.show', $doctor->slug) }}" class="nav-link link-dark">
                            <i class="fa-solid fa-chart-line p-1"></i>
                            Le tue statistiche
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reviews.index', $doctor->slug) }}" class="nav-link link-dark">
                            <i class="fa-solid fa-star-half-stroke p-1"></i>
                            Recensioni
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('calendar', $doctor->slug) }}" class="nav-link link-dark">
                            <i class="fa-solid fa-calendar-days p-1"></i>
                            Calendario
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown ps-3 pb-2">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ $doctor->photo }}" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong> Dr. {{ $doctor->firstname }} {{ $doctor->lastname }} </strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">Gestisci le tue prestazioni</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit', $doctor->slug) }}">Modifica
                                profilo</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.show', $doctor->slug) }}">Profilo</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> Logout</a> </li>
                    </ul>
                </div>
            </div>


            @yield('content')
        </main>
    </div>
</body>

</html>
