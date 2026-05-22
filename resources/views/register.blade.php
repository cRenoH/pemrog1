<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>DariMata Studio - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="img/favicon.png" type="image/png">

    <style>
        html, body {
            height: 100%;
            margin: 0 !important;
            padding: 0 !important;
            background: none !important;
            box-sizing: border-box;
        }
        .register {
            padding: 80px 0 120px 0;
           background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .register__container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        .register__wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 160px);
        }
        .register__card {
            background: #fff;
            border-radius: 24px 8px 24px 8px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.10);
            display: flex;
            max-width: 1000px;
            width: 100%;
            transition: all 0.4s cubic-bezier(.4,2,.6,1);
            position: relative;
            z-index: 2;
        }
        .register__card:hover {
            transform: scale(1.01) translateY(-3px) rotate(-1deg);
            box-shadow: 0 20px 50px rgba(229,54,55,0.13);
        }
        .login__illustration {
            flex: 1;
            background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .register__illustration {
            flex: 1;
            background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
            min-width: 260px;
            min-height: 320px;
        }

        .register__illustration::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
           background: linear-gradient(120deg, #00B4D8 10%, #0118D8 100%);
        }

        .register__illustration::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -30px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
           background: linear-gradient(120deg, #00B4D8 5%, #0118D8 100%);
        }

        .register__illustration img {
            max-width: 220px;
            width: 100%;
            height: auto;
            position: relative;
            z-index: 1;
            animation: float 4s ease-in-out infinite;
        }

        .register__content {
            flex: 1.2;
            padding: 60px 50px;
            position: relative;
            background: #f8f9fa;
        }
        .register__header {
            margin-bottom: 35px;
            text-align: center;
        }
        .register__logo {
            margin-bottom: 18px;
        }
        .register__logo img {
            height: 48px;
        }
        .register__title {
            font-size: 28px;
            font-weight: 800;
            color: #0118D8;
            margin-bottom: 12px;
            position: relative;
            letter-spacing: 1px;
        }
        .register__title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            border-radius: 4px;
        }
        .register__subtitle {
            color: #6c757d;
            font-size: 16px;
            margin-top: 18px;
        }
        .register__form .form-floating {
            margin-bottom: 18px;
            position: relative;
        }
        .register__form .form-control {
            height: 54px;
            width: 100%;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 0 18px;
            font-size: 15px;
            color: #222;
            transition: all 0.3s;
            background: #fff;
        }
        .register__form .form-control:focus {
            border-color: #00B4D8;
            box-shadow: 0 0 0 4px rgba(0,180,216,0.08);
        }
        .register__form .form-floating label {
            color: #6c757d;
            font-weight: 600;
            transition: all 0.3s;
        }
        .register__form .form-control:focus~label,
        .register__form .form-control:not(:placeholder-shown)~label {
            color: #00B4D8;
            transform: translateY(-10px) scale(0.85);
        }
        .input-group-text {
            background: transparent;
            border-right: none;
        }
        .input-group .form-control {
            border-left: none;
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 35%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            z-index: 5;
            transition: all 0.3s;
        }
        .password-toggle:hover {
            color: #00B4D8;
        }
        .register__btn {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(0,180,216,0.13);
            transition: all 0.3s;
            border: none;
            background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            color: white;
            margin-bottom: 18px;
        }
        .register__btn:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 8px 20px rgba(229,54,55,0.18);
        }
        .register__footer {
            text-align: center;
            margin-top: 18px;
        }
        .register__footer a {
            color: #00B4D8;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
        }
        .register__footer a:hover {
            text-decoration: underline;
        }
        @keyframes float {
            0% { transform: translateY(0);}
            50% { transform: translateY(-18px);}
            100% { transform: translateY(0);}
        }
        @media (max-width: 991.98px) {
            .register__card { flex-direction: column; max-width: 600px;}
            .register__illustration { padding: 40px;}
            .register__content { padding: 40px 25px;}
        }
        @media (max-width: 767.98px) {
            .register { padding: 40px 0;}
            .register__title { font-size: 24px;}
            .register__content { padding: 30px 10px;}
            .register__illustration { display: none;}
        }
        @media (max-width: 575.98px) {
            .register__content { padding: 18px 5px;}
            .register__title { font-size: 22px;}
        }
        .register-wave {
            display: block;
            width: 100%;
            height: 70px;
            position: absolute;
            bottom: -1px;
            left: 0;
            z-index: 1;
            pointer-events: none;
            fill: #f8f9fa;
        }
        .register-wave .wave-path {
            animation: move-forever 25s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;
        }
        .register-wave .wave-path:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
            opacity: 0.9;
        }
        .register-wave .wave-path:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
            opacity: 0.5;
        }
        .register-wave .wave-path:nth-child(3) {
            animation-delay: -5s;
            animation-duration: 13s;
            opacity: 0.3;
        }
        @keyframes move-forever {
            0% { transform: translate3d(-90px, 0, 0);}
            100% { transform: translate3d(85px, 0, 0);}
        }
        .is-invalid { border-color: #e53637 !important; }
    </style>
</head>
<body>
    <!-- Register Section -->
    <section class="register">
        <div class="container register__container">
            <div class="register__wrapper">
                <div class="register__card">
                    <div class="register__illustration">
                        <img src="img/logo.png" alt="Register Illustration" />
                    </div>
                    <div class="register__content">
                        <div class="register__header">
                            
                            <h1 class="register__title">Create Account</h1>
                            <p class="register__subtitle">Sign up to start your journey with DariMata Studio</p>
                        </div>
                        <!-- Tampilkan pesan sukses jika ada -->
                        @if(session('success'))
                        <div class="alert alert-success" style="background-color: #d1e7dd; color: #0f5132; padding: 1rem; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                         {{ session('success') }}
                        </div>
                        @endif
                        <!-- Tampilkan pesan error jika ada -->
                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin-bottom:16px;">
                                <ul style="margin:0; padding-left:18px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="register__form" id="registerForm" method="POST" action="{{ route('register.submit') }}">
                            @csrf
                            <div class="form-floating">
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" required>
                             
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" required>
                             
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Email Address" required>
                               
                            </div>
                            <div class="form-floating">
                            <input type="text" class="form-control" id="registerPhone_number" name="phone_number" placeholder="Phone Number" required>
                            </div>
                            <div class="form-floating" style="position:relative;">
                                <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Password" required minlength="8">
                                
                            </div>
                            <div class="form-floating" style="position:relative;">
                                <input type="password" class="form-control" id="registerConfirmPassword" name="password_confirmation" placeholder="Confirm Password" required minlength="8">
                                
                            </div>
                            <div class="form-check mb-3" style="text-align:left;">
                                <input class="form-check-input" type="checkbox" value="" id="agreeTerms" required>
                                <label class="form-check-label" for="agreeTerms">
                                    I agree to the <a href="#">Terms & Conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="btn register__btn">
                                <span class="register-btn-text">Sign Up</span>
                                <span class="register-btn-loading" style="display:none;">
                                    <i class="fas fa-spinner fa-spin"></i> Creating...
                                </span>
                            </button>
                            <div class="register__footer">
                                Already have an account? <a href="{{ route('login') }}">Sign in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Waves -->
        <svg class="register-wave" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28" preserveAspectRatio="none">
            <defs>
                <path id="wave-path-register"
                    d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                </path>
            </defs>
            <g>
                <use xlink:href="#wave-path-register" x="50" y="3" class="wave-path"></use>
                <use xlink:href="#wave-path-register" x="50" y="0" class="wave-path"></use>
                <use xlink:href="#wave-path-register" x="50" y="9" class="wave-path"></use>
            </g>
        </svg>
    </section>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        // Password toggle
        document.addEventListener('DOMContentLoaded', function () {
            const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
            const registerPasswordInput = document.getElementById('registerPassword');
            if (toggleRegisterPassword && registerPasswordInput) {
                toggleRegisterPassword.addEventListener('click', function () {
                    const type = registerPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    registerPasswordInput.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
            const toggleRegisterConfirmPassword = document.getElementById('toggleRegisterConfirmPassword');
            const registerConfirmPasswordInput = document.getElementById('registerConfirmPassword');
            if (toggleRegisterConfirmPassword && registerConfirmPasswordInput) {
                toggleRegisterConfirmPassword.addEventListener('click', function () {
                    const type = registerConfirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    registerConfirmPasswordInput.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
            // Simple client-side validation
            const registerForm = document.getElementById('registerForm');
            if (registerForm) {
                registerForm.addEventListener('submit', function (e) {
                    let isValid = true;
                    const firstName = document.getElementById('firstName');
                    const lastName = document.getElementById('lastName');
                    const email = document.getElementById('registerEmail');
                    const password = document.getElementById('registerPassword');
                    const confirmPassword = document.getElementById('registerConfirmPassword');
                    const agreeTerms = document.getElementById('agreeTerms');
                    // Reset
                    [firstName, lastName, email, password, confirmPassword].forEach(el => el.classList.remove('is-invalid'));
                    agreeTerms.classList.remove('is-invalid');
                    // Validate
                    if (!firstName.value.trim()) { firstName.classList.add('is-invalid'); isValid = false; }
                    if (!lastName.value.trim()) { lastName.classList.add('is-invalid'); isValid = false; }
                    if (!email.value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) { email.classList.add('is-invalid'); isValid = false; }
                    if (!password.value || password.value.length < 8) { password.classList.add('is-invalid'); isValid = false; }
                    if (!confirmPassword.value || confirmPassword.value !== password.value) { confirmPassword.classList.add('is-invalid'); isValid = false; }
                    if (!agreeTerms.checked) { agreeTerms.classList.add('is-invalid'); isValid = false; }
                    if (!isValid) { e.preventDefault(); return; }
                    // Loading spinner
                    const btnText = registerForm.querySelector('.register-btn-text');
                    const btnLoading = registerForm.querySelector('.register-btn-loading');
                    if (btnText && btnLoading) {
                        btnText.style.display = 'none';
                        btnLoading.style.display = 'inline-block';
                    }
                });
            }
        });
    </script>
</body>
</html>