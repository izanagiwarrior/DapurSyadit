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
                <h3 class="mb-0 text-primary" style="font-size: 28px">Dapur Syadit</h3>
                <ul class="navbar-nav ms-auto">
                    @auth
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
                <div class="banner w-100">
                    <img src="{{asset('images/banner-web.png')}}" alt="">
                </div>
                <div class="row">
                    <div class="d-flex flex-row justify-content-between">
                        <h2 class="title-section">Food Catalog</h2>
                        <input type="text" placeholder="search food here..." class="search-input">
                    </div>
                    <div class="col">
                        <div class="me-card">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title">Salad Salsa</h2>
                                <div class="d-block">
                                    <p class="text-muted d-inline">15-25 min <span>.</span> </p>
                                    <p class="text-muted d-inline">Rp.20.000/ Porsi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="me-card">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title">Salad Salsa</h2>
                                <div class="d-block">
                                    <p class="text-muted d-inline">15-25 min <span>.</span> </p>
                                    <p class="text-muted d-inline">Rp.20.000/ Porsi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="me-card">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1511690656952-34342bb7c2f2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" alt="" srcset="">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title">Salad Salsa</h2>
                                <div class="d-block">
                                    <p class="text-muted d-inline">15-25 min <span>.</span> </p>
                                    <p class="text-muted d-inline">Rp.20.000/ Porsi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>