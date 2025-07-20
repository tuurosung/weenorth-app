<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> -->
    <style>
        :root {
            --primary-purple: #6366f1;
            --primary-purple-hover: #5855eb;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }

        .login-form-section {
            padding: 3rem 2.5rem;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            background: var(--primary-purple);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .brand-logo i {
            color: white;
            font-size: 1.2rem;
        }

        /* .form-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: #6b7280;
            margin-bottom: 2rem;
        }

        .form-label {
            color: #374151;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-purple);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .input-group .form-control {
            padding-left: 2.5rem;
        }

        .input-group-text {
            background: transparent;
            border: 1px solid #d1d5db;
            border-right: none;
            color: #6b7280;
        }

        .password-toggle {
            background: transparent;
            border: 1px solid #d1d5db;
            border-left: none;
            color: #6b7280;
            cursor: pointer;
        }

        .password-toggle:hover {
            color: #374151;
        }

        .form-check-input:checked {
            background-color: var(--primary-purple);
            border-color: var(--primary-purple);
        }

        .btn-primary {
            background-color: var(--primary-purple);
            border-color: var(--primary-purple);
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            width: 100%;
            margin: 1.5rem 0;
        }

        .btn-primary:hover {
            background-color: var(--primary-purple-hover);
            border-color: var(--primary-purple-hover);
        } */

        .divider {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
            color: #6b7280;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            background: white;
            padding: 0 1rem;
        }

        .social-login {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-btn {
            flex: 1;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0.75rem;
            background: white;
            color: #374151;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .social-btn:hover {
            background: #f9fafb;
            color: #374151;
            text-decoration: none;
        }

        .social-btn i {
            font-size: 1.2rem;
        }

        .testimonial-section {
            background: url(' {{  asset('images/banner-3.jpg') }}') no-repeat center center/cover;
            color: white;
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            height: 100%;;
        }

        .testimonial-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.1;
        }

        .stars {
            color: #fbbf24;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .testimonial-text {
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            position: relative;
            z-index: 1;
        }

        .testimonial-author h5 {
            margin: 0;
            font-weight: 600;
        }

        .testimonial-author p {
            margin: 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .forgot-password {
            color: var(--primary-purple);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            color: var(--primary-purple-hover);
        }

        .signup-link {
            text-align: center;
            margin-top: 2rem;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .signup-link a {
            color: var(--primary-purple);
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            color: var(--primary-purple-hover);
        }

        .footer-text {
            text-align: center;
            color: #9ca3af;
            font-size: 0.8rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .login-card {
                margin: 1rem;
            }

            .login-form-section {
                padding: 2rem 1.5rem;
            }

            .testimonial-section {
                display: none;
            }
        }
    </style>
</head>
@include('partials.head')

<body>
    <div class="container-fluid login-container">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="login-card">
                    <div class="row g-4">
                        <!-- Login Form Section -->
                        <div class="col-md-6">
                            <div class="login-form-section">



                                <img src="{{  asset('images/logo.png') }}" alt="" class="img-fluid img-sm w-100px mb-5 mx-auto d-block">

                                <!-- Form Header -->
                                <div class="form-header mb-4">
                                    <h2 class="cal-sans-regular fw-500 text-center">Login to your account</h2>
                                    <p class="form-subtitle text-center">Welcome back, please enter your details</p>
                                </div>

                                @include('partials.errors')

                                <!-- Login Form -->
                                <form class="" action="{{ route('login') }}" method="POST">

                                @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email Address</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            id="email"
                                            aria-describedby="helpId"
                                            placeholder="yourname@website.com"
                                            required
                                            value="test@admin.com"
                                        />
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            id="password"
                                            placeholder="your password"
                                            value="test_admin"
                                        />
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
                                    Not registered yet? <a href="#">Create an account</a>
                                </div>


                            </div>
                        </div>

                        <!-- Testimonial Section -->
                        <div class="col-md-6 d-none d-md-block">
                            <div class="testimonial-section d-flex flex-column justify-content-end">
                                <div class="testimonial-bg "></div>

                                <div class="fs-24px inter">
                                    Data Analytics transformed our raw data into actionable insights. It's a
                                    game-changer!
                                </div>
                                <div class="testimonial-author">
                                    <h5>Michael Smith</h5>
                                    <p>Data analyst</p>
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
