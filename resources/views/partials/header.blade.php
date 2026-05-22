<!-- Style -->
    <style>
        /* Style untuk link navigasi yang aktif */
        .main-navigation ul li a.active {
            color: var(--primary-color) !important;
            font-weight: 700 !important;
            position: relative !important;
        }

        /* Membuat garis bawah biru */
        .main-navigation ul li a.active::after {
            content: '' !important;
            position: absolute !important;
            bottom: -1px !important;
            left: 0 !important;
            width: 100% !important;
            height: 3px !important;
            background-color: var(--primary-color) !important;
            border-radius: 2px !important;
        }
    </style>

<!-- Header -->
    <header class="site-header">
        <div class="container header-container">
            <div class="header-logo">
                <a href="/">
                    <img src="img/logo2.png" alt="DariMata Studio Logo">
                </a>
            </div>

            <nav class="main-navigation">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('shop2') }}" class="{{ request()->routeIs('shop2') ? 'active' : '' }}">Shop</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    </li>
                </ul>
            </nav>

            <form class="header-search" action="{{ route('shop2') }}" method="GET">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search products..." aria-label="Search">
                <button type="submit" aria-label="Submit search"><i class="fas fa-search"></i></button>
            </form>

            <div class="header-actions">
                <div class="action-item wishlist-icon active">
                    <a href="wishlist" style="color: inherit; text-decoration: none;">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
                <div class="action-item cart-icon">
                    <a href="{{ route('cart') }}" style="color: inherit; text-decoration: none;">
                        <i class="fas fa-shopping-bag"></i>
                        {{-- Variabel dari ViewServiceProvider akan tampil di sini --}}
                        <span class="cart-count-badge">{{ $cartQuantity ?? 0 }}</span>
                    </a>
                </div>
                <!-- Auth Buttons (Before Login) -->

<div class="action-item profile-icon" id="profileIconContainer">
    @auth
        {{-- Blok ini hanya akan tampil jika user sudah login --}}
        @php
            // Ambil objek user yang sedang login dari Auth
            $user = Auth::user();
        @endphp
         <div class="user-profile-dropdown active">
            <button class="profile-trigger" id="profileTrigger">
                <div class="profile-avatar-small">{{ strtoupper(substr($user->first_name, 0, 2)) }}</div>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu-custom" id="profileDropdown">
                <div class="dropdown-header">
                    <div class="dropdown-avatar">{{ strtoupper(substr($user->first_name, 0, 2)) }}</div>
                    <div class="dropdown-name">{{ $user->first_name }} {{ $user->last_name }}</div>
                    <div class="dropdown-email">{{ $user->email }}</div>
                </div>
                <ul class="dropdown-menu-list">
                    <li>
                        <li>
                            <a href="{{ route('user-profile') }}" class="dropdown-menu-item">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-menu-item">
                            <i class="fas fa-history"></i>
                            <span>Order History</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-menu-item">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                         <li>
                            <a href="{{ route('logout') }}" class="dropdown-menu-item logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @else
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn btn-auth btn-login">
                Login
            </a>
        </div>
    @endauth
    </div>
    </header>