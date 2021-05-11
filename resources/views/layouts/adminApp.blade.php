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
    <link rel='stylesheet' href='{{asset('css/me.css')}}' type='text/css' />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="images/logo_title.png" type="image/x-icon">
</head>

<body>
    <div class="row" style="height: 100vh;width:100%">
        <div class="col-md-2 p-0" style="
        padding: 10px;
        box-shadow: 2px 0 6px 3px #f1f1f1;">
            <div class="d-flex flex-column align-items-center mt-4" style="width:100%">
                <h3 class="mb-0 text-primary" style="font-size: 28px">Dapur Syadit</h3>
            </div>
            {{-- akhir bagian header navigation --}}

            {{-- bagian navigation --}}
            <ul class="sidebar">
                <li class="sidebar-list"><a class="sidebar-anchor active" href="{{route('admin.home')}}">Dashboard</a>
                </li>
                <li class="sidebar-list"><a class="sidebar-anchor active" href="{{route('admin.user')}}">User
                        Management</a></li>
                <li class="sidebar-list"><a class="sidebar-anchor active" href="{{route('admin.create')}}">Products</a>
                </li>
                <li class="sidebar-list"><a class="sidebar-anchor active" href="{{route('admin.userOrder')}}">Orders</a>
                </li>
                <li class="sidebar-list"><a class="sidebar-anchor" class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="col-10 p-3">
            @yield('content')
        </div>
    </div>
</body>

</html>