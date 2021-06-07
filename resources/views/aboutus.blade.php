<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dapur Syadit</title>

    <!-- Icon -->
    <link rel="icon" href="images/logo_title.png" type="image/x-icon">

    <!-- Styles -->
    <link rel='stylesheet' href='css/me.css' type='text/css' media='screen' />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <STYLE>A {text-decoration: none;} </STYLE>
</head>

<body style="min-height: 100vh">

    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg" style="height: 8vh">
        <div class="container-fluid px-5 m-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{route('welcome')}}">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a href="{{ route('welcome') }}"><h3 class="mb-0 text-primary" style="font-size: 28px" >Dapur Syadit</h3></a>
                <ul class="navbar-nav ms-auto">

                    <a class="nav-item nav-link pr-4 text-primary" href="{{ route('aboutus') }}">About Us</a>
                    <a class="nav-item nav-link pr-4 text-primary" href="{{ route('faq') }}">FAQ</a>
                    @auth
                    <a class="nav-item nav-link pr-4 text-primary" class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                    <a class="nav-item nav-link pr-4 text-primary" href="{{ route('login') }}">Sign in</a>
                    @if (Route::has('register'))
                    <a class="nav-item nav-link ml-5 text-primary" href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @endif

    <div class="container-fluid px-5" style="height:92vh">
        <div class="row" style="height: 100%">
            <div class="col">
            <div class="card mt-4" style="border: 0;">
            <img class="card-img-top" src="{{asset('images/banner-web.png')}}" alt="Card image cap">
                <div class="card-body px-3 mt-4">
                <h2>Apa itu Dapur Syadit?</h2>
                    <p>Dapur syadit merupakan website catering yag ...</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>

</html>