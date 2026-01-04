<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your WEE-North Account</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> -->
    <link href="{{ asset('css/weenorth/login.css') }}" type="text/css" rel="stylesheet" />
</head>
@include('partials.head')

<body>
    <div class="container-fluid login-container px-2 m-0">
        <div class="row justify-content-center w-100 m-0">
            <div class="login-card col-sm-12 col-lg-3 py-5">
                <div class="login-form-section">



                    <img src="{{  asset('images/logo.png') }}" alt="" class="img-fluid img-sm w-100px mb-5 mx-auto d-block">

                    <!-- Form Header -->
                    <div class="form-header mb-4">
                        <h2 class="cal-sans-regular fw-500 text-center">Create Your account</h2>
                        <p class="form-subtitle text-center">Create an account to access member-only content, update your profile, and more.</p>
                    </div>

                    @include('partials.errors')

                    <!-- Login Form -->
                    <form class="mt-5" action="{{ route('signup.verifyId') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="weenorth_id" class="form-label">WEE-North ID</label>
                            <input
                                type="text"
                                class="form-control"
                                name="weenorth_id"
                                id="weenorth_id"
                                aria-describedby="helpId"
                                placeholder="eg. NV000001"
                                required
                            />
                        </div>


                        <button type="submit" class="btn btn-primary w-100">Verify ID</button>
                    </form>


                    <!-- Signup Link -->
                    <div class="signup-link">
                        Not registered yet? <a href="#">Create an account</a>
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
