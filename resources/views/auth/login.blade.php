<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link href="{{ asset('css/weenorth/login.css') }}" type="text/css" rel="stylesheet" />

    <style rel="stylesheet">

        @media screen and (min-width: 1400px) {
            .inner-container {
                margin: 0 25%;
            }
        }

        @media (max-width: 1400px) {

            .inner-container {
                margin: 0 0rem;
            }
        }

        .login .login-content {
            max-width: 26rem;
        }

        .input::placeholder {
            color: #B0B5C1;
            opacity: 1;
        }

    </style>
</head>
@include('partials.head')

<body>
    <div id="app" class="app app-full-height app-without-header">
        <div class="login inner-container">

            <div class="card shadow-lg border-0 w-100 h-50">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="rounded-2"
                                style="background-image: url({{ asset('images/banner.jpg') }}); background-size: cover; background-position: center; height: 100%;">

                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="app-full-height">
                                <div class="login-content">

                                    <div class="py-5">

                                        <img src="{{  asset('images/logo.png') }}" alt=""
                                            class="img-fluid img-sm w-100px mb-5 mx-auto d-block">

                                        <!-- Form Header -->
                                        <div class="form-header mb-5">
                                            <h2 class="cal-sans-regular fw-500 text-center">
                                                Login To Your Account
                                            </h2>
                                            <p class="form-subtitle text-center">
                                                Welcome back, please enter your details
                                            </p>
                                        </div>

                                        @include('partials.errors')

                                        <!-- Login Form -->
                                        <form class="" action="{{ route('login') }}" method="POST">

                                            @csrf

                                            <div class="mb-3">
                                                <label for="" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                                                    placeholder="yourname@website.com" required value="" />
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="your password"
                                                    value="" />
                                            </div>


                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">
                                                        Keep me logged in
                                                    </label>
                                                </div>
                                                <a href="#" class="forgot-password">Forgot password?</a>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100 py-3">Log in</button>
                                        </form>

                                        <!-- Signup Link -->
                                        <div class="signup-link">
                                            Not registered yet? <a href="{{ route('register') }}">Create an account</a>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('passwordToggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
    </script>
</body>

</html>
