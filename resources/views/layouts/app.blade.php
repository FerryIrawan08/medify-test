<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @yield('css')
</head>

<body>
    <div id="app">
        @if(!View::hasSection('hide_navbar'))
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2">
            <div class="container position-relative">
                <a class="navbar-brand d-flex align-items-center py-0" href="{{ url('/') }}">
                    <img src="{{ asset('images/medify-logo.png') }}" alt="Medify Logo" height="32" onerror="this.style.display='none'">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Center Menu: Absolute Centered on Desktop (Truly Dead Center) -->
                <div class="d-none d-md-flex position-absolute top-50 start-50 translate-middle" style="z-index: 10;">
                    <ul class="navbar-nav d-flex flex-row align-items-center gap-1 mb-0">
                        <li class="nav-item">
                            <a class="nav-link px-3 py-1.5 rounded-pill {{ request()->is('master-items*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : 'text-secondary' }}" href="{{ url('/master-items') }}">
                                Master Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 py-1.5 rounded-pill {{ request()->is('kategoris*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : 'text-secondary' }}" href="{{ url('/kategoris') }}">
                                Kategori Items
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Mobile Menu Links -->
                    <ul class="navbar-nav d-md-none mb-2 mt-2 gap-1">
                        <li class="nav-item">
                            <a class="nav-link px-3 py-1.5 rounded-pill {{ request()->is('master-items*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : 'text-secondary' }}" href="{{ url('/master-items') }}">
                                Master Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 py-1.5 rounded-pill {{ request()->is('kategoris*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : 'text-secondary' }}" href="{{ url('/kategoris') }}">
                                Kategori Items
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0 d-flex align-items-center">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        @endif

        <main class="@yield('main_class', 'py-4')">
            @yield('content')
        </main>
    </div>
    @yield('js')
</body>

</html>