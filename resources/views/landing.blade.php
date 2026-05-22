<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Discover Your Style">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Landing Page, Modern, Minimalist">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DariMata Studio - Welcome</title>

    <!-- Google Font: Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        /* Reset and Base Styles */
        :root {
            --primary-color: #0118D8;
            /* Biru khas Anda */
            --secondary-color: #e53637;
            /* Merah untuk aksen seperti badge */
            --text-color: #111111;
            --text-light-color: #555555;
            --background-color: #ffffff;
            --light-gray-color: #f8f9fa;
            --border-color: #eeeeee;
            --header-height: 80px;
            --border-radius: 20px;
            /* Border radius untuk search box */
            --white-color: #ffffff;
            /* Tambahkan variabel warna putih */
            --accent-color: #f3c41c;
            /* Contoh warna aksen jika diperlukan */
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-gray-color);
            padding-top: var(--header-height);

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--secondary-color);
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        ul {
            list-style: none;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            border-radius: 4px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid transparent;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: #ffffff;
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #0012b3;
            border-color: #0012b3;
            color: #ffffff;
        }

        /* Header Styles */
        .site-header {
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border-color);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            margin: 0;
            width: 100%;
            z-index: 1000;
            height: var(--header-height);
            display: flex;
            align-items: center;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .header-logo a {
            display: inline-block;
        }

        .header-logo img {
            max-height: 40px;
        }

        .main-navigation {
            margin-left: auto;
            margin-right: 30px;
        }

        .main-navigation ul {
            display: flex;
            align-items: center;
        }

        .main-navigation ul li {
            margin-top: 15px;
            margin-left: 30px;
        }

        .main-navigation ul li:first-child {
            margin-left: 0;
        }

        .main-navigation ul li a {
            color: var(--text-color);
            font-weight: 600;
            font-size: 15px;
            padding: 10px 0;
            position: relative;
        }

        .main-navigation ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }

        .main-navigation ul li a:hover::after,
        .main-navigation ul li.active a::after {
            width: 100%;
        }

        .header-search {
            display: flex;
            align-items: center;
            background-color: var(--light-gray-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 0px 5px 0px 15px;
            height: 40px;
            width: 250px;
            transition: width 0.3s ease, box-shadow 0.3s ease;
        }

        .header-search:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(1, 24, 216, 0.1);
            width: 300px;
        }

        .header-search input[type="search"] {
            border: none;
            background: transparent;
            outline: none;
            flex-grow: 1;
            font-size: 14px;
            color: var(--text-color);
            height: 100%;
        }

        .header-search input[type="search"]::placeholder {
            color: var(--text-light-color);
        }

        .header-search button {
            background: transparent;
            border: none;
            color: var(--text-light-color);
            font-size: 1rem;
            cursor: pointer;
            padding: 0 10px;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .header-search button:hover {
            color: var(--primary-color);
        }

        .header-actions {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .header-actions .action-item {
            margin-left: 20px;
            position: relative;
            color: var(--text-color);
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
        }

        .header-actions .action-item:hover {
            color: var(--primary-color);
        }

        .header-actions .action-item .cart-count-badge {
            position: absolute;
            top: 0px;
            right: 0px;
            background-color: var(--secondary-color);
            color: white;
            font-size: 10px;
            font-weight: bold;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Modern Auth Buttons */
  /* Modern Login Button */
.auth-buttons {
    display: flex;
    align-items: center;
    margin-left: 20px;
    
}

.btn-auth {
    padding: 0;
    border-radius: 20px;
    font-weight: 600;
    text-transform: none;
    border: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    height: 30px;
    width: 70px;
    font-size: 0.8rem;
}

.btn-login {
    background: var(--primary-color);
    color: white;
}

.btn-login:hover {
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(1, 24, 216, 0.3);
    background: #0012b3;
    color: white;
}
        /* User Profile Dropdown */
        /* Profile Dropdown Modern Update */
.user-profile-dropdown {
    position: relative;
    margin-left: 10px;
}

.profile-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 20px;
    transition: all 0.3s ease;
    background: rgba(1, 24, 216, 0.1);
}

.profile-trigger:hover {
    background: rgba(1, 24, 216, 0.2);
}

.profile-avatar-small {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0118D8, #00B4D8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    font-weight: 600;
    border: 2px solid white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.dropdown-menu-custom {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    min-width: 240px;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    margin-top: 8px;
    border: 1px solid rgba(0,0,0,0.05);
}

.dropdown-menu-custom.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-header {
    padding: 16px;
    text-align: center;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.dropdown-avatar {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0118D8, #00B4D8);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 8px;
    color: white;
    font-size: 18px;
    font-weight: 600;
    border: 3px solid white;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.dropdown-name {
    font-size: 15px;
    font-weight: 600;
    color: #111;
    margin-bottom: 4px;
}

.dropdown-email {
    color: #666;
    font-size: 13px;
}

.dropdown-menu-list {
    padding: 8px 0;
}

.dropdown-menu-item {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    color: #444;
    font-size: 14px;
    transition: all 0.2s ease;
}

.dropdown-menu-item i {
    width: 20px;
    margin-right: 12px;
    color: #666;
    font-size: 14px;
    transition: all 0.2s ease;
}

.dropdown-menu-item:hover {
    background: rgba(1, 24, 216, 0.05);
    color: #0118D8;
}

.dropdown-menu-item:hover i {
    color: #0118D8;
}

.dropdown-menu-item.logout {
    border-top: 1px solid rgba(0,0,0,0.05);
    color: #e74c3c;
}

.dropdown-menu-item.logout:hover {
    background: rgba(231, 76, 60, 0.05);
}

.dropdown-menu-item.logout i {
    color: #e74c3c;
}

/* Chevron icon */
.profile-trigger .fa-chevron-down {
    font-size: 12px;
    color: #0118D8;
    transition: transform 0.3s ease;
}

.profile-trigger.active .fa-chevron-down {
    transform: rotate(180deg);
}

        @media (max-width: 768px) {
            .header-nav {
                padding: 0 1rem;
            }
            
            .auth-buttons {
                gap: 0.25rem;
            }
            
            .btn-auth {
                padding: 6px 15px;
                font-size: 0.8rem;
            }
            
            .landing-container {
                margin: 1rem;
                padding: 2rem;
                min-width: auto;
            }
            
            .dashboard-nav {
                padding: 0 1rem;
            }
            
            .profile-card {
                margin: 1rem;
            }
            
            .posts-section {
                margin: 1rem;
            }
        }

        .mobile-menu-toggle {
            display: none;
            font-size: 1.5rem;
            color: var(--text-color);
            background: none;
            border: none;
            cursor: pointer;
            margin-left: 15px;
        }

        /* Mobile Navigation Styles */
        .mobile-nav {
            position: fixed;
            top: 0;
            left: -100%;
            width: 280px;
            height: 100%;
            background-color: var(--background-color);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            z-index: 1002;
            transition: left 0.3s ease;
            overflow-y: auto;
        }

        .mobile-nav.active {
            left: 0;
        }

        .mobile-nav-close {
            font-size: 1.5rem;
            color: var(--text-color);
            background: none;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .mobile-nav ul {
            margin-top: 30px;
        }

        .mobile-nav ul li {
            margin-bottom: 15px;
        }

        .mobile-nav ul li a {
            color: var(--text-color);
            font-weight: 600;
            font-size: 16px;
            display: block;
        }

        .mobile-nav ul li a:hover {
            color: var(--primary-color);
        }

        .mobile-nav-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1001;
        }

        .mobile-nav-overlay.active {
            display: block;
        }

        /* Responsive Styles for Header */
        @media (max-width: 1199px) {
            .header-search {
                width: 200px;
            }

            .header-search:focus-within {
                width: 250px;
            }

            .main-navigation ul li {
                margin-left: 20px;
            }
        }

        @media (max-width: 991px) {
            .main-navigation {
                display: none;
            }

            .header-search {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .header-actions .action-item {
                margin-left: 15px;
            }
        }

        @media (max-width: 767px) {
            body {
                padding-top: 70px;
            }

            .site-header {
                height: 70px;
            }

            .header-logo img {
                max-height: 35px;
            }

            .header-actions .action-item {
                margin-left: 10px;
                font-size: 1rem;
                width: 32px;
                height: 32px;
            }

            .profile-icon-wrapper {
                width: 32px;
                height: 32px;
            }

            .profile-icon-wrapper i {
                font-size: 0.9rem;
            }

            .header-actions .action-item .cart-count-badge {
                width: 14px;
                height: 14px;
                font-size: 9px;
                top: -2px;
                right: -2px;
            }
        }

        @media (max-width: 480px) {
            .header-actions .action-item {
                margin-left: 8px;
            }
        }

        /* Hero Section */
        .hero {
            width: 100%;
            min-height: 85vh;
            /* Minimal tinggi agar wave terlihat baik */
            background-color: var(--primary-color);
            /* Warna biru utama */
            position: relative;
            padding: 120px 0 60px 0;
            /* Padding atas dan bawah, bawah lebih besar untuk wave */
            overflow: hidden;
            /* Hindari scroll horizontal */
            margin-top: 0 !important;
            /* Penting agar wave tidak membuat scroll horizontal */
            display: flex;
            /* Untuk align items center */
            align-items: center;
            /* Vertically center content */
        }

        .hero .hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
            opacity: 0.2;
            /* Opacity sangat rendah untuk garis-garis samar */
            mix-blend-mode: overlay;
            /* Coba juga: soft-light, screen */
        }

        .hero .container {
            position: relative;
            z-index: 3;
            /* Konten di atas bg dan waves */
        }

        .hero h1 {
            margin: 0;
            font-size: 48px;
            font-weight: 700;
            line-height: 1.2;
            color: var(--white-color);
            /* Teks putih */
        }

        .hero h1 span {
            color: var(--accent-color);
            /* Warna aksen jika ada */
        }

        .hero p {
            color: rgba(255, 255, 255, 0.85);
            /* Teks putih dengan sedikit transparansi */
            margin: 15px 0 30px 0;
            /* Margin bawah lebih besar untuk tombol */
            font-size: 22px;
            /* Sedikit lebih kecil dari contoh Bootslander */
        }

        .hero .btn-get-started {
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 35px;
            border-radius: 50px;
            transition: 0.5s;
            color: var(--primary-color);
            /* Teks tombol biru */
            background: var(--white-color);
            /* Background tombol putih */
            margin-right: 15px;
            border: 2px solid var(--white-color);
            /* Border putih */
        }

        .hero .btn-get-started:hover {
            background: transparent;
            /* Transparan saat hover */
            color: var(--white-color);
            /* Teks putih saat hover */
        }

        .hero .btn-watch-video {
            font-size: 16px;
            transition: 0.5s;
            color: var(--white-color);
            font-weight: 600;
        }

        .hero .btn-watch-video i {
            color: rgba(255, 255, 255, 0.7);
            font-size: 32px;
            transition: 0.3s;
            line-height: 0;
            margin-right: 8px;
        }

        .hero .btn-watch-video:hover {
            color: var(--white-color);
        }

        .hero .btn-watch-video:hover i {
            color: var(--white-color);
        }


        .hero .hero-img img.animated {
            /* Targetkan gambar di dalam .hero-img */
            animation: up-down 2s ease-in-out infinite alternate-reverse both;
        }

        @keyframes up-down {
            0% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        /* Hero Waves */
        .hero-waves {
            display: block;
            width: 100%;
            height: 70px;
            /* Tinggi ombak bisa disesuaikan */
            position: absolute;
            bottom: -1px;
            /* Agar sedikit overlap dan menyatu sempurna */
            left: 0;
            z-index: 2;
            /* Di atas hero-bg, di bawah konten */
            fill: var(--background-color);
            /* Warna putih agar menyatu dengan section bawah */
        }

        .hero-waves .wave-path {
            /* Ganti nama kelas jika id di SVG berbeda */
            animation: move-forever 25s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;
        }

        .hero-waves .wave-path:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
            opacity: 0.9;
        }

        .hero-waves .wave-path:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
            opacity: 0.5;
        }

        .hero-waves .wave-path:nth-child(3) {
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

        /* Responsive Styles for Hero */
        @media (max-width: 991px) {
            .hero {
                min-height: auto;
                /* Tinggi otomatis di mobile */
                padding: 100px 0 80px 0;
                /* Padding bawah lebih besar untuk wave */
            }

            .hero .hero-img {
                text-align: center;
                margin-top: 60px;
            }

            .hero .hero-img img {
                width: 70%;
            }
        }

        @media (max-width: 768px) {
            .hero {
                text-align: center;
            }

            .hero h1 {
                font-size: 34px;
            }

            .hero p {
                font-size: 18px;
            }

            .hero .d-flex {
                /* Agar tombol stack di mobile */
                justify-content: center;
                flex-direction: column;
                align-items: center;
            }

            .hero .btn-get-started {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .hero .btn-watch-video {
                margin-left: 0;
            }
        }


        /* Custom Banner Section Styles */
        .custom-banner-section {
            padding: 60px 0;
            /* Beri padding atas agar tidak terlalu mepet wave */
            overflow: hidden;
            /* Untuk animasi AOS */
        }

        .custom-banner-row {
            display: flex;
            flex-wrap: wrap;
            /* Agar responsif */
            gap: 20px;
            /* Jarak antar kolom */
        }

        .banner-col-left {
            flex: 1 1 58%;
            /* Sekitar 7/12, bisa disesuaikan */
            min-width: 300px;
            /* Agar tidak terlalu kecil */
        }

        .banner-col-right {
            flex: 1 1 38%;
            /* Sekitar 5/12 */
            display: flex;
            flex-direction: column;
            gap: 20px;
            /* Jarak antara banner 1 dan 3 */
            min-width: 280px;
        }

        .banner__item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            /* Konsisten */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.07);
            width: 100%;
            height: 100%;
            /* Agar mengisi kolom */
            display: flex;
            /* Untuk text overlay */
            align-items: flex-end;
            /* Teks di bawah */
        }

        .banner-col-left .banner__item {
            min-height: 420px;
            /* Sesuaikan tinggi banner besar */
        }

        .banner-col-right .banner__item {
            min-height: 200px;
            /* Sesuaikan tinggi banner kecil */
        }


        .banner__item:hover .banner__item__pic img {
            transform: scale(1.05);
        }

        .banner__item:hover .banner__item__text a:after {
            width: 35px;
            background: var(--secondary-color);
        }

        .banner__item__pic {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .banner__item__pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Penting agar gambar mengisi area */
            transition: transform 0.4s ease;
        }

        .banner__item__text {
            position: relative;
            /* Agar di atas gambar */
            z-index: 2;
            left: 0;
            /* Reset dari style lama */
            bottom: 0;
            /* Reset dari style lama */
            width: calc(100% - 40px);
            /* Beri padding */
            margin: 20px;
            /* Padding dari semua sisi */
            background: rgba(255, 255, 255, 0.9);
            /* Background lebih solid */
            padding: 15px 20px;
            border-radius: 6px;
            text-align: left;
            /* Teks rata kiri */
        }

        .banner__item__text h2 {
            color: var(--text-color);
            font-weight: 700;
            font-size: 1.4rem;
            /* Sesuaikan ukuran font */
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .banner-col-left .banner__item__text h2 {
            font-size: 1.8rem;
            /* Font lebih besar untuk banner utama */
        }


        .banner__item__text a {
            display: inline-block;
            color: var(--primary-color);
            font-size: 0.875rem;
            /* 14px */
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 2px 0;
            position: relative;
        }

        .banner__item__text a:after {
            position: absolute;
            left: 0;
            bottom: -2px;
            /* Sedikit di bawah teks */
            width: 100%;
            height: 2px;
            background: var(--primary-color);
            content: "";
            transition: all 0.3s ease;
        }


        /* Image Hover Section Styles */
        .image-hover-section {
            padding: 50px 0;
            background-color: #f8f9fa;
        }

        .image-hover-container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            height: 350px;
            gap: 10px;
            align-items: center;
        }

        .hover-item {
            flex: 1;
            height: 100%;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: flex 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .hover-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 8px;
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .image-hover-container:hover .hover-item:not(:hover) {
            flex: 0.6;
        }

        .hover-item:hover {
            flex: 3;
            transform: scaleY(1.05);
        }

        .hover-item:hover img {
            transform: scale(1.15);
        }

        .section-title-hover {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title-hover h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }

        .section-title-hover p {
            font-size: 1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto 20px auto;
        }

        /* Main Content Placeholder */
        .main-content {
            padding: 60px 0;
            text-align: center;
        }

        .main-content h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 1.1rem;
            color: var(--text-light-color);
            max-width: 700px;
            margin: 0 auto 30px auto;
        }

        /* Footer Styles */
        .site-footer {
            background-color: #0118D8;
            color: #fff;
            padding: 60px 0 20px;
            font-size: 14px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-widget h5 {
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .footer-widget ul li {
            margin-bottom: 10px;
        }

        .footer-widget ul li a {
            color: rgba(255, 255, 255, 0.8);
        }

        .footer-widget ul li a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .footer-widget p {
            margin-bottom: 15px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.8);
        }

        .social-icons a {
            color: #fff;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .social-icons a:hover {
            color: #ffffff;
            opacity: 0.8;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-widget form input[type="email"] {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .footer-widget form input[type="email"]::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .footer-widget form button {
            background: #fff;
            color: var(--primary-color);
        }

        .footer-widget form button:hover {
            background: var(--light-gray-color);
            color: var(--primary-color);
        }


        /* Responsive Styles */
        @media (max-width: 1199px) {
            .header-search {
                width: 200px;
            }

            .header-search:focus-within {
                width: 250px;
            }

            .main-navigation ul li {
                margin-left: 20px;
            }
        }

        @media (max-width: 991px) {

            .main-navigation,
            .header-search {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .header-actions .action-item {
                margin-left: 15px;
            }

            .custom-banner-row {
                flex-direction: column;
                /* Stack kolom di tablet */
            }

            .banner-col-left,
            .banner-col-right {
                flex-basis: 100%;
                /* Kolom jadi lebar penuh */
            }

            .banner-col-left .banner__item {
                min-height: 350px;
            }

            .banner-col-right .banner__item {
                min-height: 250px;
            }

            .image-hover-container {
                height: auto;
                flex-direction: column;
                /* Stack di tablet */
            }

            .hover-item {
                min-height: 250px;
                width: 100%;
                /* Lebar penuh saat stack */
                flex: 1 !important;
                /* Reset flex behavior */
            }

            .image-hover-container:hover .hover-item:not(:hover) {
                flex: 1 !important;
                /* Reset flex behavior */
            }

            .hover-item:hover {
                transform: scale(1.03);
                /* Efek hover lebih halus */
            }
        }

        @media (max-width: 767px) {
            body {
                padding-top: 70px;
            }

            .site-header {
                height: 70px;
            }

            .header-logo img {
                max-height: 35px;
            }

            .header-actions .action-item {
                margin-left: 10px;
                font-size: 1rem;
                width: 32px;
                height: 32px;
            }

            .profile-icon-wrapper {
                width: 32px;
                height: 32px;
            }

            .profile-icon-wrapper i {
                font-size: 0.9rem;
            }

            .header-actions .action-item .cart-count-badge {
                width: 14px;
                height: 14px;
                font-size: 9px;
                top: -2px;
                right: -2px;
            }

            .banner-col-left .banner__item {
                min-height: 300px;
            }

            .banner-col-right .banner__item {
                min-height: 220px;
            }

            .banner__item__text h2 {
                font-size: 1.2rem;
            }

            .banner-col-left .banner__item__text h2 {
                font-size: 1.5rem;
            }

            .image-hover-section {
                padding: 40px 0;
            }

            .section-title-hover h2 {
                font-size: 1.8rem;
            }

            .main-content {
                padding: 40px 0;
            }

            .main-content h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .header-actions .action-item {
                margin-left: 8px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('partials.header')

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobileNav">
        <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close menu">&times;</button>
        <form class="header-search mobile-search" action="/search" method="GET" style="margin: 20px 0; width: 100%;">
            <input type="search" name="q" placeholder="Search products..." aria-label="Search">
            <button type="submit" aria-label="Submit search"><i class="fas fa-search"></i></button>
        </form>
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="shop2">Shop</a></li>
            <li><a href="about">About Us</a></li>
            <li><a href="contact">Contact</a></li>
            <li>
                <hr style="margin: 15px 0; border-color: var(--border-color);">
            </li>
            <li><a href="user-profile">My Account</a></li>
            <li><a href="user-profile#orders-tab">Order History</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

    <!-- Main Content Area -->
    <main>
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <img src="./img/Dari  Mata/Untitled-2-01.png" alt="Abstract background lines" class="hero-bg">

            <div class="container">
                <div class="row gy-4 justify-content-center text-center text-lg-start">
                    <!-- Konten teks di tengah untuk mobile, kiri untuk desktop -->
                    <div class="col-lg-7 d-flex flex-column justify-content-center" data-aos="fade-in">
                        <h1>DariMata Studio: <br><span>Your Style, Reimagined.</span></h1>
                        <p>Discover exclusive fashion collections designed to express yourself. Quality, comfort, and style meet here.</p>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <a href="{{ route('shop2') }}" class="btn-get-started">Explore Collection</a>
                        </div>
                    </div>
                    <!-- Gambar di kanan untuk desktop, disembunyikan di mobile jika terlalu ramai -->
                    <div class="col-lg-5 order-lg-last hero-img d-none d-lg-block" data-aos="zoom-out"
                        data-aos-delay="100">
                        <img src="img/logo.png" class="img-fluid animated" alt="Model DariMata Studio">
                    </div>
                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                    <path id="wave-path-landing"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g>
                    <use xlink:href="#wave-path-landing" x="50" y="3" class="wave-path"></use>
                    <use xlink:href="#wave-path-landing" x="50" y="0" class="wave-path"></use>
                    <use xlink:href="#wave-path-landing" x="50" y="9" class="wave-path"></use>
                </g>
            </svg>
        </section><!-- /Hero Section -->

        <section class="main-content" style="background-color: var(--background-color); padding-top: 80px;">
            <!-- Pastikan bg putih -->
            {{-- TAMBAHKAN BLOK INI --}}
            @if(session('welcome_message'))
            <div class="alert alert-success" style="background-color: #d1e7dd; color: #0f5132; padding: 1rem; border-radius: 8px; margin-bottom: 20px;">
                {{ session('welcome_message') }}
            </div>
            @endif
             <div class="container">
                <h1>Welcome to DariMata Studio</h1>
                <p>Discover the latest fashion trends. We offer a selection of high-quality clothing and accessories to help you express your unique style. Explore our collection and find your new favorites today.</p>
                <a href="{{ route('shop2') }}" class="btn btn-primary">Explore Collection</a>
            </div>
        </section>

        <!-- Custom Banner Section -->
        <section class="custom-banner-section">
            <div class="container">
                <div class="custom-banner-row">
                    <div class="banner-col-left" data-aos="fade-right" data-aos-delay="200">
                        <div class="banner__item">
                            <div class="banner__item__pic">
                                <img src="img/Dari  Mata/Mockup-Crewneck-DRMTSTD.png"
                                    alt="Featured Collection - Banner 2" loading="lazy">
                            </div>
                            <div class="banner__item__text">
                                <h2>Signature Crewneck</h2>
                                <a href="{{ route('shop2', ['category' => 'crewneck']) }}">Discover More</a>
                            </div>
                        </div>
                    </div>
                    <div class="banner-col-right">
                        <div class="banner__item" data-aos="fade-left" data-aos-delay="0">
                            <div class="banner__item__pic">
                                <img src="img/Dari  Mata/mockup-totebag-eye.jpg" alt="New Arrivals - Banner 1"
                                    loading="lazy">
                            </div>
                            <div class="banner__item__text">
                                <h2>New Arrivals</h2>
                                <a href="{{ route('shop2', ['category' => 'new-arrivals']) }}">Shop Now</a>
                            </div>
                        </div>
                        <div class="banner__item" data-aos="fade-up" data-aos-delay="100">
                            <div class="banner__item__pic">
                                <img src="img/Dari  Mata/maneken-STDIO2.png" alt="Special Offers - Banner 3"
                                    loading="lazy">
                            </div>
                            <div class="banner__item__text">
                                <h2>Urban Essentials</h2>
                                <a href="{{ route('shop2', ['category' => 'essentials']) }}">View Selection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Custom Banner Section -->


        <!-- MODIFIED Hover Image Section -->
        <section class="image-hover-section">
            <div class="container">
                <div class="section-title-hover" data-aos="fade-up">
                    <h2>Our Featured Styles</h2>
                    <p>Explore our curated collection featuring unique and trending designs.</p>
                </div>
                <div class="image-hover-container" id="dynamicImageHoverContainer" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="hover-item"><img src="img/Dari  Mata/Mockup-Crewneck-Happiness.jpg" alt="Featured Style Red">
                    </div>
                    <div class="hover-item"><img src="img/Dari  Mata/Mockup-Hoodie-DRMTSTD.jpg" alt="Featured Style Neutral"></div>
                    <div class="hover-item"><img src="img/Dari  Mata/Mockup-Boxy-Workaholic.jpg"
                            alt="Featured Style Mannequin Blue"></div>
                    <div class="hover-item"><img src="img/Dari  Mata/Mockup-Hoodie-Workaholic.jpg"
                            alt="Featured Style Crewneck"></div>
                    <div class="hover-item"><img src="img/Dari  Mata/mockup-crewneck.jpg" alt="Featured Style Orange">
                    </div>
                </div>
            </div>
        </section>
        <!-- END MODIFIED Hover Image Section -->

        <section class="section" style="padding: 60px 0;">
            <div class="container text-center">
                <h2 data-aos="fade-up">Why Shop With Us?</h2>
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div
                            style="padding: 20px; border: 1px solid var(--border-color); border-radius: 8px; margin-bottom: 20px; background-color: #fff; box-shadow: var(--box-shadow);">
                            <i class="fas fa-shipping-fast fa-2x"
                                style="color: var(--primary-color); margin-bottom: 15px;"></i>
                            <h4>Fast Shipping</h4>
                            <p style="font-size: 14px; color: var(--text-light-color);">Get your orders delivered quickly and reliably.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div
                            style="padding: 20px; border: 1px solid var(--border-color); border-radius: 8px; margin-bottom: 20px; background-color: #fff; box-shadow: var(--box-shadow);">
                            <i class="fas fa-medal fa-2x" style="color: var(--primary-color); margin-bottom: 15px;"></i>
                            <h4>Premium Quality</h4>
                            <p style="font-size: 14px; color: var(--text-light-color);">We use only the best materials for our products.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div
                            style="padding: 20px; border: 1px solid var(--border-color); border-radius: 8px; margin-bottom: 20px; background-color: #fff; box-shadow: var(--box-shadow);">
                            <i class="fas fa-headset fa-2x"
                                style="color: var(--primary-color); margin-bottom: 15px;"></i>
                            <h4>Excellent Service</h4>
                            <p style="font-size: 14px; color: var(--text-light-color);">Our team is ready to assist you with any questions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-widget">
                    <h5>About Us</h5>
                    <p>DariMata Studio is dedicated to bringing you unique and stylish fashion pieces that inspire
                        confidence.</p>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div class="footer-widget">
                    <h5>Shop</h5>
                    <ul>
                        <li><a href="{{ route('shop2', ['category' => 'new-arrivals']) }}">New Arrivals</a></li>
                        <li><a href="{{ route('shop2', ['category' => 'clothing']) }}">Clothing</a></li>
                        <li><a href="{{ route('shop2', ['category' => 'accessories']) }}">Accessories</a></li>
                        <li><a href="{{ route('shop2', ['category' => 'sale']) }}">Sale</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h5>Customer Service</h5>
                    <ul>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#">Shipping & Returns</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Size Guide</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h5>Newsletter</h5>
                    <p>Subscribe to our newsletter for the latest updates and promotions.</p>
                    <form action="#" method="post" style="display: flex; margin-top: 10px;">
                        <input type="email" name="email" placeholder="Your Email" required
                            style="flex-grow: 1; padding: 8px; border: 1px solid rgba(255,255,255,0.2); border-radius: 3px 0 0 3px; background: rgba(255,255,255,0.1); color: #fff;">
                        <button type="submit" class="btn"
                            style="border-radius: 0 3px 3px 0; padding: 8px 12px; background: #fff; color: var(--primary-color); text-transform: capitalize; font-weight: 600;">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <span id="currentYearFooter"></span> DariMata Studio. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/js/glightbox.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi AOS
            AOS.init({
                duration: 800, // Durasi animasi
                once: true,    // Animasi hanya terjadi sekali
                offset: 50,   // Offset lebih kecil agar banner terlihat lebih cepat
            });
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileNav = document.getElementById('mobileNav');
            const mobileNavClose = document.getElementById('mobileNavClose');
            const mobileNavOverlay = document.getElementById('mobileNavOverlay');
            if (mobileMenuToggle && mobileNav && mobileNavClose && mobileNavOverlay) {
                mobileMenuToggle.addEventListener('click', function () { mobileNav.classList.add('active'); mobileNavOverlay.classList.add('active'); document.body.style.overflow = 'hidden'; });
                function closeMobileMenu() { mobileNav.classList.remove('active'); mobileNavOverlay.classList.remove('active'); document.body.style.overflow = ''; }
                mobileNavClose.addEventListener('click', closeMobileMenu);
                mobileNavOverlay.addEventListener('click', closeMobileMenu);
            }
            const currentYearSpanFooter = document.getElementById('currentYearFooter');
            if (currentYearSpanFooter) { currentYearSpanFooter.textContent = new Date().getFullYear(); }

            const searchForms = document.querySelectorAll('.header-search');
            searchForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const query = form.querySelector('input[type="search"]').value;
                    if (query.trim() !== '') { window.location.href = '/shop2?search=' + encodeURIComponent(query); }
                });
            });

        });
    </script>
        <script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle dropdown profile
    const profileTrigger = document.getElementById('profileTrigger');
    const profileDropdown = document.getElementById('profileDropdown');
    
    if (profileTrigger && profileDropdown) {
        profileTrigger.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            profileDropdown.classList.remove('show');
        });
    }
});
</script>
    

</body>

</html>