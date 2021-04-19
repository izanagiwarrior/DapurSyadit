<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dapur Syadit</title>

    <!-- Icon -->
    <link rel="icon" href="images/logo_title.png" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel='stylesheet' href='css/me.css' type='text/css' media='screen' />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body id="fullsingle" class="page-template-page-fullsingle-me">

    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                    <a class="me-auto text-white" aria-current="page" href="{{ url('/home') }}">Home</a>
                    @else
                    <a class="nav-link text-white" href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                    <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @endif
    <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 ">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 ">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 ">Register</a>
            @endif
            @endauth
        </div>
        @endif -->
    <div class="fs-me">
        <div class="me-content">

            <div class="logo">

                <img src="images/logo_home.png" alt="Logo" />

            </div>

            <div class="bio">

                <p>This is me. I push pixels at <a href="#">Google</a>, write words on <a href="#">Medium</a> and spill thoughts on <a href="#">Twitter</a>.</p>

            </div>
        </div>
    </div>

    </div>
</body>

</html>