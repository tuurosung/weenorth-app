<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your WEE-North Account</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> -->
    <link href="{{ asset('css/weenorth/login.css') }}" type="text/css" rel="stylesheet" />
    <style>
        .otp-container {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid #ced4da;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .otp-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            outline: none;
        }

        .otp-input:disabled {
            background-color: #e9ecef;
        }
    </style>
</head>
@include('partials.head')

<body>
    <div class="container-fluid login-container px-2">
        <div class="row justify-content-center w-100 m-0">
            <div class="login-card col-sm-12 col-lg-3 m-0">
                <div class="login-form-section">



                    <img src="{{  asset('images/logo.png') }}" alt="" class="img-fluid img-sm w-100px mb-5 mx-auto d-block">

                    <!-- Form Header -->
                    <div class="form-header mb-4">
                        <h2 class="cal-sans-regular fw-500 text-center">Registration</h2>
                        <p class="form-subtitle text-center">Fill Your Details</p>
                    </div>

                    @include('partials.errors')

                    <!-- Login Form -->
                    <form class="" action="{{ route('signup.complete-registration') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="weenorth_id" class="form-label">Your Email Address</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                placeholder="eg. you@example.com"
                                required
                            />
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                id="password"
                                placeholder="password"
                                required
                            />
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                class="form-control"
                                name="confirm_password"
                                id="confirm_password"
                                placeholder="retype password"
                            />
                        </div>

                        <label for="otp" class="form-label">Enter 4-Digit OTP</label>

                        <div class="otp-container mb-3">
                            <input type="text" class="form-control otp-input" maxlength="1" pattern="\d" data-index="0">
                            <input type="text" class="form-control otp-input" maxlength="1" pattern="\d" data-index="1">
                            <input type="text" class="form-control otp-input" maxlength="1" pattern="\d" data-index="2">
                            <input type="text" class="form-control otp-input" maxlength="1" pattern="\d" data-index="3">
                        </div>

                        <input type="hidden" id="otpValue" name="otp" required>

                        <button type="submit" class="btn btn-primary w-100 py-3">Create Account</button>
                    </form>


                    <!-- Signup Link -->
                    <div class="signup-link">
                        Already have an account? <a href="{{ route('login') }}">Login</a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.otp-input');
            const hiddenInput = document.getElementById('otpValue');
            const form = document.getElementById('otpForm');

            // Update hidden input value
            function updateOTP() {
                let otp = '';
                inputs.forEach(input => {
                    otp += input.value;
                });
                hiddenInput.value = otp;
            }

            inputs.forEach((input, index) => {
                // Handle input
                input.addEventListener('input', function (e) {
                    const value = e.target.value;

                    // Only allow digits
                    if (!/^\d*$/.test(value)) {
                        e.target.value = '';
                        return;
                    }

                    updateOTP();

                    // Move to next input
                    if (value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });

                // Handle backspace
                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Backspace' && !e.target.value && index > 0) {
                        inputs[index - 1].focus();
                    }
                });

                // Handle paste
                input.addEventListener('paste', function (e) {
                    e.preventDefault();
                    const pastedData = e.clipboardData.getData('text').trim();

                    // Only process if pasted data contains only digits
                    if (!/^\d+$/.test(pastedData)) return;

                    // Distribute digits across inputs
                    const digits = pastedData.split('').slice(0, inputs.length);
                    digits.forEach((digit, i) => {
                        if (inputs[i]) {
                            inputs[i].value = digit;
                        }
                    });

                    updateOTP();

                    // Focus last filled input or last input
                    const lastIndex = Math.min(digits.length, inputs.length - 1);
                    inputs[lastIndex].focus();
                });

                // Select all on focus
                input.addEventListener('focus', function (e) {
                    e.target.select();
                });
            });

            // Form submission
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const otp = hiddenInput.value;

                if (otp.length !== 4) {
                    document.getElementById('result').innerHTML =
                        '<div class="alert alert-danger">Please enter all 4 digits</div>';
                    return;
                }

                document.getElementById('result').innerHTML =
                    `<div class="alert alert-success">OTP Submitted: ${otp}</div>`;

                // Here you would normally send the OTP to your server
                console.log('OTP Value:', otp);
            });

            // Focus first input on load
            inputs[0].focus();
        });
    </script>
</body>

</html>
