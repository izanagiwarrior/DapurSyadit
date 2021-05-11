@extends('layouts.app')
@section('title', 'Register')
@section('content')

<style>
    /* The message box is shown when the user clicks on the password field */
    #message {
        display: none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 5px;
        margin-top: 5px;
    }

    #message p {
        font-size: 12px;
    }

    #message h3 {
        font-size: 15px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
    }

    /* Add a red text color and an "x" icon when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
    }
</style>
<div class="container-fluid" style="height: 100vh">
    <div class="row" style="height: 100%">
        <div class="col-6 bg-primary p-0"
            style="background-image:url({{asset('images/banner-login.png')}});background-size:cover;background-position:auto;">
        </div>
        <div class=" col-6 d-flex align-items-center">
            <div class="card mx-auto d-flex justify-content-center" style="width:24rem;border-radius: 30px">
                <h2 class="text-center my-4" style="font-size:30px;font-weight:bold;">Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mx-5 my-3">
                        <label for="name" class="text-muted">{{ __('Nama Lengkap') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mx-5 my-3">
                        <label for="email" class="text-muted">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mx-5 my-3">
                        <label for="password" class="text-muted">{{ __('Password') }}</label>
                        <input id="psw" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="current-password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <div id="message">
                            <h3>Password must contain the following:</h3>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mx-5 my-3">
                        <label for="password" class="text-muted">{{ __('Confirm Password') }}</label>
                        <input id="psw" type="password" class="form-control" name="password_confirmation"
                            autocomplete="current-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    </div>
                    <div class="form-group d-flex flex-column align-items-center">
                        <button type="submit" class="btn btn-primary" style="width: 180px;border-radius:30px">
                            {{ __('Register') }}
                        </button>
                        <p class="mt-2">Sudah memiliki akun? <a href="{{route('login')}}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
@endsection