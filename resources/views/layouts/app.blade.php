<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="images/logo_title.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel='stylesheet' href='{{asset('css/me.css')}}' type='text/css' media='screen' />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    @if (Route::has('login'))
    @auth
    <nav class="navbar navbar-expand-lg" style="height: 10vh">
        <div class="container-fluid px-5 m-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{route('welcome')}}">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <h3 class="mb-0 text-primary"> <a href="{{route('home')}}" style=" font-size:
                        28px;text-decoration:none;"">Dapur Syadit</a></h3>
                <ul class="navbar-nav ms-auto d-flex justify-content-between">
                    <a href="" class="nav-item nav-link"><img src="{{asset('icons/shopping-bag.svg')}}" width="24px"
                            height="24px" alt="shopping bag"></a>
                    <a class="nav-item nav-link" href="{{ route('login') }}">Hi,
                        {{Auth::User()->name}}</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn-custom">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    @endauth
    @endif
    <main style="height: 90vh">
        @yield('content')
    </main>
    </div>
    <script src="{{asset('js/index.js')}}"></script>
</body>

</html>