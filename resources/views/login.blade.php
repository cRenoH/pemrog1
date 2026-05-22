<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>DariMata Studio - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="img/favicon.png" type="image/png">

    <style>
        body, html {
    margin: 0;
    padding: 0;
    background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
    min-height: 100vh;
    min-height: 100dvh;
    overflow-x: hidden;
}

/* Login Section */
        .login {
            padding: 80px 0 120px 0;
            background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .login__container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .login__wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 160px);
        }

        .login__card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            display: flex;
            max-width: 1000px;
            width: 100%;
            transition: all 0.4s ease;
            position: relative;
        }

        .login__card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
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

        .login__illustration::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
           background: linear-gradient(120deg, #00B4D8 10%, #0118D8 100%);
        }

        .login__illustration::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -30px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
           background: linear-gradient(120deg, #00B4D8 5%, #0118D8 100%);
        }

        .login__illustration img {
            max-width: 100%;
            height: auto;
            position: relative;
            z-index: 1;
            animation: float 6s ease-in-out infinite;
        }

        .login__content {
            flex: 1;
            padding: 60px;
            position: relative;
        }

        .login__header {
            margin-bottom: 40px;
            text-align: center;
        }

        .login__logo {
            margin-bottom: 20px;
        }

        .login__logo img {
            height: 50px;
        }

        .login__title {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 15px;
            position: relative;
        }

        .login__title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            border-radius: 4px;
        }

        .login__subtitle {
            color: var(--text-light-color);
            font-size: 16px;
            margin-top: 25px;
        }

        .login__form .form-floating {
            margin-bottom: 20px;
            position: relative;
        }

        .login__form .form-floating label {
            color: var(--text-light-color);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login__form .form-control {
            height: 56px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0 20px;
            font-size: 15px;
            color: var(--text-color);
            transition: all 0.3s ease;
            box-shadow: none;
        }

        .login__form .form-floating,
        .login__form .form-control {
            width: 100%;
            max-width: 100%;
            min-width: 320px;
        }

        @media (max-width: 575.98px) {

            .login__form .form-floating,
            .login__form .form-control {
                min-width: 0;
            }
        }

        .login__form .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(1, 24, 216, 0.1);
        }

        .login__form .form-control:focus~label {
            color: var(--primary-color);
            transform: translateY(-10px) scale(0.85);
        }

        .login__form .form-control:not(:placeholder-shown)~label {
            transform: translateY(-10px) scale(0.85);
        }

        .input-group-text {
            background: transparent;
            border-right: none;
        }

        .input-group .form-control {
            border-left: none;
        }

        .input-group .form-control:focus {
            border-left: 1px solid var(--primary-color);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 35%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-light-color);
            z-index: 5;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        .login__options {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .remember-me {
            display: flex;
        }

        .remember-me input {
            margin-right: 8px;
            accent-color: var(--primary-color);
        }

        .forgot-password {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-password::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: all 0.3s ease;
        }

        .forgot-password:hover::after {
            width: 100%;
        }

        .login__btn {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(0, 24, 216, 0.2);
            transition: all 0.3s ease;
            border: none;
            background: linear-gradient(120deg, #00B4D8 0%, #0118D8 100%);
            color: white;
            margin-bottom: 25px;
        }

        .login__btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 24, 216, 0.3);
        }

        .login__btn:active {
            transform: translateY(0);
        }

        .login__divider {
            position: relative;
            margin: 25px 0;
            text-align: center;
            color: var(--text-light-color);
        }

        .login__divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background: var(--border-color);
            z-index: 1;
        }

        .login__divider span {
            background: #fff;
            padding: 0 15px;
            position: relative;
            z-index: 2;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .social-login__btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .social-login__btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .social-login__btn.google {
            background: #DB4437;
        }

        .social-login__btn.facebook {
            background: #4267B2;
        }

        .social-login__btn.apple {
            background: #000000;
        }

        /* Animation */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login__content {
            animation: fadeIn 0.6s ease;
        }

        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .login__card {
                flex-direction: column;
                max-width: 600px;
            }

            .login__illustration {
                padding: 40px;
            }

            .login__illustration img {
                max-height: 250px;
            }

            .login__content {
                padding: 40px;
            }

            .modal-content {
                padding: 30px;
            }
        }

        @media (max-width: 767.98px) {
            .login {
                padding: 40px 0;
            }

            .login__title {
                font-size: 24px;
            }

            .login__content {
                padding: 30px;
            }

            .login__illustration {
                display: none;
            }

            .modal-content {
                margin: 20% auto;
                padding: 25px;
            }

            .modal-title {
                font-size: 24px;
            }
        }

        @media (max-width: 575.98px) {
            .login__content {
                padding: 25px;
            }

            .login__title {
                font-size: 22px;
            }

            .login__options {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .login__form .form-control {
                height: 50px;
                padding: 0 15px;
            }

            .modal-content {
                width: 95%;
                padding: 20px;
            }

            .modal-title {
                font-size: 22px;
            }
        }

        .login-wave {
            display: block;
            width: 100vw;
            min-width: 100vw;
            height: 70px;
            position: fixed;
            left: 0;
            bottom: 0;
            z-index: 10;
            pointer-events: none;
            fill: #f8f9fa;
        }

        .login-wave .wave-path {
            animation: move-forever 25s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;
        }

        .login-wave .wave-path:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
            opacity: 0.9;
        }

        .login-wave .wave-path:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
            opacity: 0.5;
        }

        .login-wave .wave-path:nth-child(3) {
            animation-delay: -5s;
            animation-duration: 13s;
            opacity: 0.3;
        }

        @keyframes move-forever {
            0% {
                transform: translate3d(-90px, 0, 0);
            }

            100% {
                transform: translate3d(85px, 0, 0);
            }
        }
    </style>
</head>

<body>
    <!-- Login Section -->
    <section class="login">
        <div class="container login__container">
            <div class="login__wrapper">
                <div class="login__card">
                    <div class="login__illustration">
                        <img src="img/logo.png" alt="Login Illustration">
                    </div>
                    <div class="login__content">
                        <div class="login__header">
                            @if(session('error'))
                            <div class="alert alert-danger" style="background-color: #f8d7da; color: #842029; padding: 1rem; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                            {{ session('error') }}
                            </div>
                            @endif
                            <h1 class="login__title">Welcome Back</h1>
                            <p class="login__subtitle">Sign in to access your account and continue your shopping
                                experience</p>
                        </div>

                        {{-- Tampilkan pesan sukses jika ada --}}
                        @if(session('success'))
                            <div class="alert alert-success" style="background-color: #d1e7dd; color: #0f5132; padding: 1rem; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form class="login__form" id="loginForm" method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            <div class="form-floating">
                                <input type="email" class="form-control" id="loginEmail" placeholder="Email Address"
                                    required name="email" value="{{ old('email') }}">
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control" id="loginPassword" placeholder="Password"
                                    required name="password">
                            </div>

                            <div class="login__options" style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="remember-me" style="display: flex; align-items: center;">
                                    <input type="checkbox" id="rememberMe" name="remember">
                                    <label for="rememberMe" class="form-label" style="color: var(--text-light-color); font-weight: 600; margin-left: 8px;">Remember me</label>
                                </div>
                                <a href="#" class="forgot-password">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn login__btn">
                                <span class="login-btn-text " style="color: #fff;">Sign In</span>
                                <span class="login-btn-loading" style="display: none;">
                                    <i class="fas fa-spinner fa-spin"></i> Signing In...
                                </span>
                            </button>

                            <div class="login__divider">
                                <span>or continue with</span>
                            </div>

                            <div class="social-login">
                                <a href="#" class="social-login__btn google" aria-label="Sign in with Google">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a href="#" class="social-login__btn facebook" aria-label="Sign in with Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>

                            <div class="login__footer">
                                Don't have an account? <a href="/register" id="openSignupModal">Sign up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Waves -->
    <svg class="login-wave" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"viewBox="150 24 150 28" preserveAspectRatio="none">
    <defs>
        <path id="wave-path-login"
            d="M-10 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </path>
    </defs>
    <g>
        <use xlink:href="#wave-path-login" x="50" y="3" class="wave-path"></use>
        <use xlink:href="#wave-path-login" x="50" y="0" class="wave-path"></use>
        <use xlink:href="#wave-path-login" x="50" y="9" class="wave-path"></use>
    </g>
    </svg>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Header JavaScript
            const profileIconContainer = document.getElementById('profileIconContainerLogin');
            const profileDropdownMenu = document.getElementById('profileDropdownMenuLogin');
            if (profileIconContainer && profileDropdownMenu) {
                profileIconContainer.addEventListener('click', function (event) {
                    event.stopPropagation();
                    profileDropdownMenu.classList.toggle('active');
                });
                document.addEventListener('click', function (event) {
                    if (profileIconContainer && !profileIconContainer.contains(event.target) && profileDropdownMenu && !profileDropdownMenu.contains(event.target)) {
                        profileDropdownMenu.classList.remove('active');
                    }
                });
            }

            const mobileMenuToggle = document.getElementById('mobileMenuToggleLogin');
            const mobileNav = document.getElementById('mobileNavLogin');
            const mobileNavClose = document.getElementById('mobileNavCloseLogin');
            const mobileNavOverlay = document.getElementById('mobileNavOverlayLogin');
            if (mobileMenuToggle && mobileNav && mobileNavClose && mobileNavOverlay) {
                mobileMenuToggle.addEventListener('click', function () {
                    mobileNav.classList.add('active');
                    mobileNavOverlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
                function closeMobileMenu() {
                    mobileNav.classList.remove('active');
                    mobileNavOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
                mobileNavClose.addEventListener('click', closeMobileMenu);
                mobileNavOverlay.addEventListener('click', closeMobileMenu);
            }

            // Update current year in footer
            const currentYear = document.getElementById('currentYear');
            if (currentYear) {
                currentYear.textContent = new Date().getFullYear();
            }
            const currentYearFooter = document.getElementById('currentYearFooter');
            if (currentYearFooter) {
                currentYearFooter.textContent = new Date().getFullYear();
            }

            // Cart count
            const headerCartCountLoginEl = document.getElementById('headerCartCountLogin');
            if (headerCartCountLoginEl) {
                const storedCart = localStorage.getItem('shoppingCart');
                let totalItems = 0;
                if (storedCart) {
                    try {
                        const shoppingCartData = JSON.parse(storedCart);
                        shoppingCartData.forEach(item => {
                            totalItems += (Number(item.quantity) || 0);
                        });
                    } catch (e) { console.error("Error parsing cart for header count:", e); }
                }
                headerCartCountLoginEl.textContent = totalItems;
            }

            // Password toggle for login form
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('loginPassword');
            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            }
            // Form validation and submission for login form
            const loginForm = document.getElementById('loginForm');
            if (loginForm) {
                
            }
        });
    </script>
</body>

</html>