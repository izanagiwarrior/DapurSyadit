@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="container-fluid" style="height: 100vh">
    <div class="row" style="height: 100%">
        <div class="col-6 bg-primary p-0"
            style="background-image:url({{asset('images/banner-login.png')}});background-size:cover;background-position:auto;">
        </div>
        <div class=" col-6 d-flex align-items-center">
            <div class="card mx-auto d-flex justify-content-center" style="width:24rem;height:70%;border-radius: 30px">
                <h2 class="text-center my-4" style="font-size:30px;font-weight:bold;">Sign in</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mx-5 my-3">
                        <label for="email" class="text-muted">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mx-5 my-5">
                        <label for="password" class="text-muted">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group d-flex flex-column align-items-center">
                        <button type="submit" class="btn btn-primary" style="width: 180px;border-radius:30px">
                            {{ __('Login') }}
                        </button>
                        <p class="mt-2">Belum memiliki akun? <a href="{{route('register')}}">Daftar</a></p>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>
@endsection