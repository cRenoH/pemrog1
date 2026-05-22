<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Tentang Kami">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, About Us, Cerita Kami, Brand Fashion">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami - DariMata Studio</title>

    <!-- Google Font: Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome and Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Tambahkan ini di bagian head -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- AOS Library for Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Reset and Base Styles (Konsisten dengan landing.html) */
        :root {
            --primary-color: #0118D8;
            --secondary-color: #e53637;
            --text-color: #111111;
            --text-light-color: #555555;
            --background-color: #ffffff;
            --light-gray-color: #f8f9fa;
            --border-color: #eeeeee;
            --header-height: 80px;
            --border-radius: 8px;
            /* Konsisten dengan elemen lain */
            --box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
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
            background-color: var(--background-color);
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
            padding: 12px 25px;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            border-radius: 6px;
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
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(1, 24, 216, 0.2);
        }

        .btn-outline-primary {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        /* Header Styles (Sama seperti landing.html) */
        .site-header {
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border-color);
            position: fixed;
            top: 0;
            left: 0;
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
            border-radius: 20px;
            /* Sesuai landing.html */
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

        .user-profile-dropdown {
    position: relative;
    margin-left: 15px;
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
    background: linear-gradient(135deg, #0118d8, #00b4d8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    font-weight: 600;
    border: 2px solid white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.dropdown-menu-custom {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    min-width: 280px;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    margin-top: 8px;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.dropdown-menu-custom.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-header {
    padding: 16px;
    text-align: center;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.dropdown-avatar {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0118d8, #00b4d8);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 8px;
    color: white;
    font-size: 18px;
    font-weight: 600;
    border: 3px solid white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.dropdown-name {
    font-size: 16px;
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
    padding: 12px 16px;
    color: #333;
    font-size: 14px;
    transition: all 0.2s ease;
}

.dropdown-menu-item i {
    width: 24px;
    margin-right: 12px;
    color: #666;
    font-size: 16px;
    transition: all 0.2s ease;
}

.dropdown-menu-item:hover {
    background: rgba(1, 24, 216, 0.05);
    color: #0118d8;
}

.dropdown-menu-item:hover i {
    color: #0118d8;
}

.dropdown-menu-item.logout {
    border-top: 1px solid rgba(0, 0, 0, 0.05);
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
    color: #0118d8;
    transition: transform 0.3s ease;
}

.profile-trigger.active .fa-chevron-down {
    transform: rotate(180deg);
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

        /* Breadcrumb Styles (Mirip checkout.html) */
        .breadcrumb-shop {
            background-color: var(--light-gray-color);
            padding: 20px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .breadcrumb-text {
            text-align: left;
        }

        .breadcrumb-links a {
            color: var(--text-light-color);
            margin-right: 8px;
            font-size: 0.9rem;
        }

        .breadcrumb-links a:not(:last-child)::after {
            content: "/";
            margin-left: 8px;
            color: var(--text-light-color);
        }

        .breadcrumb-links span {
            color: var(--text-color);
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* About Page Specific Styles */
        .about-hero {
            background-color: var(--primary-color);
            padding: 80px 0;
            text-align: center;
            color: #ffffff;
        }

        .about-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .about-hero p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 30px auto;
            opacity: 0.9;
            line-height: 1.7;
        }

        .about-section {
            padding: 60px 0;
        }

        .about-section .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .about-section .section-title h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .about-section .section-title p {
            font-size: 1rem;
            color: var(--text-light-color);
            max-width: 600px;
            margin: 0 auto;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 40px;
            margin-bottom: 50px;
        }

        .about-content.reverse {
            flex-direction: row-reverse;
        }

        .about-text {
            flex: 1;
        }

        .about-text h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .about-text p {
            margin-bottom: 15px;
            line-height: 1.7;
            color: var(--text-light-color);
        }

        .about-image {
            flex: 1;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .about-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        /* Perbaikan untuk Values Section */
        .values-section {
            background-color: var(--light-gray-color);
            padding: 80px 0;
        }

        .values-section .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .values-section .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .values-section .section-title h2::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);

        }

        .values-section .section-title p {
            color: var(--text-light-color);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .value-item {
            text-align: center;
            padding: 30px;
            background-color: var(--background-color);
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .value-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: rgba(1, 24, 216, 0.1);
        }

        .value-item .icon {
            font-size: 2.2rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: rgba(1, 24, 216, 0.05);
            border-radius: 50%;
            width: 80px;
            height: 80px;
            transition: all 0.3s ease;
        }

        .value-item:hover .icon {
            background-color: var(--primary-color);
            color: #fff;
            transform: rotate(15deg);
        }

        .value-item h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-color);
        }

        .value-item p {
            font-size: 1rem;
            color: var(--text-light-color);
            line-height: 1.7;
        }


        /* Perbaikan untuk Team Section */
        .team-section {
            padding: 80px 0;
            background-color: #f9fafc;
        }

        .team-section .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .team-section .section-title h2 {
            color: var(--text-color);
            font-size: 2.5rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .team-section .section-title h2::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);
        }

        .team-section .section-title p {
            color: var(--text-light-color);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .team-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            justify-items: center;
            margin: 0 auto;
            max-width: 1200px;
            padding: 0 1.5rem;
        }

        .team-card {
            position: relative;
            width: 100%;
            max-width: 280px;
            background-color: #fff;
            padding: 2rem 1.5rem 3rem;
            border-radius: 1rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.03);
            overflow: hidden;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .team-card__border {
            width: 120px;
            height: 120px;
            border: 2px solid var(--primary-color);
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin: 0 auto 1rem;
            transition: all 0.3s ease;
        }

        .team-card:hover .team-card__border {
            border-color: var(--secondary-color);
            transform: scale(1.05);
        }

        .team-card__img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .team-card:hover .team-card__img {
            transform: scale(1.05);
        }

        .team-card__name {
            color: var(--text-color);
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .team-card:hover .team-card__name {
            color: var(--primary-color);
        }

        .team-card__profession {
            color: var(--text-light-color);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            display: inline-block;
            position: relative;
        }

        .team-card__profession::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background: var(--primary-color);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .team-card:hover .team-card__profession::after {
            opacity: 1;
        }

        .team-card__social {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            background: var(--primary-color);
            transform: translateY(100%);
            transition: transform 0.4s ease;
            z-index: 2;
        }

        .team-card:hover .team-card__social {
            transform: translateY(0);
        }

        .team-card__social-list {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .team-card__social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .team-card__social-link:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        /* Responsive columns */
        @media (max-width: 992px) {
            .team-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .team-container {
                grid-template-columns: 1fr;
            }
        }

        /* Footer Styles (Sama seperti landing.html) */
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

            .about-hero h1 {
                font-size: 2.5rem;
            }

            .about-content {
                flex-direction: column;
            }

            .about-content.reverse {
                flex-direction: column-reverse;
                /* Tetap column reverse untuk variasi */
            }

            .about-image {
                margin-top: 30px;
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

            .about-hero {
                padding: 60px 0;
            }

            .about-hero h1 {
                font-size: 2rem;
            }

            .about-hero p {
                font-size: 1rem;
            }

            .about-section .section-title h2 {
                font-size: 1.8rem;
            }

            .about-text h3 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .header-actions .action-item {
                margin-left: 8px;
            }
        }

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
    </style>
</head>

<body>
    @include('partials.header')

    <div class="mobile-nav" id="mobileNav">
        <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close menu">&times;</button>
        <form class="header-search mobile-search" action="/search" method="GET" style="margin: 20px 0; width: 100%;">
            <input type="search" name="q" placeholder="Search products..." aria-label="Search">
            <button type="submit" aria-label="Submit search"><i class="fas fa-search"></i></button>
        </form>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="shop2">Shop</a></li>
            <li class="active"><a href="about">About Us</a></li>
            <li><a href="contact">Contact</a></li>
            <li>
                <hr style="margin: 15px 0; border-color: var(--border-color);">
            </li>
            <li><a href="user-profilee">My Account</a></li>
            <li><a href="user-profilee#orders-tab">Order History</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-shop">
        <div class="container">
            <div class="breadcrumb-text">
                <div class="breadcrumb-links">
                    <a href="./">Home</a>
                    <span>About Us</span>
                </div>
            </div>
        </div>
    </section>

    <!-- About Hero Section -->
    <section class="about-hero" data-aos="fade-in" data-aos-duration="800">
        <div class="container">
            <h1>See Deeper, Wear Deeper.</h1>
            <p>At DariMata Studio, we believe that style is a reflection of the soul. Each of our pieces is designed to be a personal expression—authentic, full of character, and memorable at first sight.</p>
            <a href="shop2" class="btn btn-primary" style="background-color: #fff; color: var(--primary-color); border-color: #fff;">Explore Collection</a>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-content" data-aos="fade-up">
                <div class="about-text">
                    <h3>Started from the Lens, Realized in Style.</h3>
                    <p>DariMata Studio was born from a love of visual detail and a desire to bring beauty that is not only seen, but also felt. Originally known as a product photography and videography studio, we have now expanded our horizons into the world of fashion—without leaving behind the artistic values that are our identity.</p>
                    <p>We believe that every piece of clothing is a work of art. Through distinctive design and premium quality, we want to be a palette of expression for the young generation—unique, relevant, and full of meaning.</p>
                </div>
                <div class="about-image">
                    <img src="img/about/team.PNG" alt="Proses kreatif DariMata Studio" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Philosophy Section -->
    <section class="about-section" style="background-color: var(--light-gray-color);">
        <div class="container">
            <div class="about-content reverse" data-aos="fade-up">
                <div class="about-text">
                    <h3>Minimalist. Modern. Functional.</h3>
                    <p>We are inspired by the dynamic rhythm of urban life and the need for versatile yet personal style. Every design is made to blend easily, yet still highlight the character of the wearer.</p>
                    <p>We don't just follow trends. We create trends that last beyond time—prioritizing quality, detail, and timeless silhouettes. Every DariMata product is a long-term style investment.</p>
                </div>
                <div class="about-image">
                    <img src="img/about/MoodBoard - Dari mata.jpg" alt="Moodboard desain DariMata Studio" loading="lazy">
                    <!-- Ganti dengan gambar yang relevan -->
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="values-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Our Core Values</h2>
                <p>The principles that guide every step of our work.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-item">
                        <div class="icon"><i class="fas fa-gem"></i></div>
                        <h4>Premium Quality</h4>
                        <p>We use only the best materials and careful production processes to create clothing that is durable, comfortable, and of high value.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-item">
                        <div class="icon"><i class="fas fa-lightbulb"></i></div>
                        <h4>Innovative Design</h4>
                        <p>Our design team constantly explores to create fresh and relevant styles, with an artistic touch that never goes out of style.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-item">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <h4>Customer Focus</h4>
                        <p>Your satisfaction is our priority. We are committed to providing a personal, friendly, and memorable shopping experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Our Creative Team</h2>
                <p>The people behind every DariMata Studio creation.</p>
            </div>
            <div class="team-container">
                <!-- Team Member 1 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-card__border">
                        <img src="img/about/aqbil.jpg" alt="Aqbil" class="team-card__img">
                    </div>
                    <h3 class="team-card__name">Thufail Aqbil</h3>
                    <span class="team-card__profession">Lead Designer</span>
                    <div class="team-card__social">
                        <ul class="team-card__social-list">
                            <li><a href="https://facebook.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <li><a href="https://instagram.com/thufailaqbill" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-instagram"></i>
                                </a></li>
                            <li><a href="https://twitter.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-twitter"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-card__border">
                        <img src="img/about/danang.jpeg" alt="Danang" class="team-card__img">
                    </div>
                    <h3 class="team-card__name">Danang Y.P</h3>
                    <span class="team-card__profession">Head of Production</span>
                    <div class="team-card__social">
                        <ul class="team-card__social-list">
                            <li><a href="https://facebook.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <li><a href="https://instagram.com/danyp_404" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-instagram"></i>
                                </a></li>
                            <li><a href="https://twitter.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-twitter"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-card__border">
                        <img src="img/about/prima.jpeg" alt="Prima" class="team-card__img">
                    </div>
                    <h3 class="team-card__name">Agio Prima K.</h3>
                    <span class="team-card__profession">Marketing Manager</span>
                    <div class="team-card__social">
                        <ul class="team-card__social-list">
                            <li><a href="https://facebook.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <li><a href="https://instagram.com/pukulgaysialan" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-instagram"></i>
                                </a></li>
                            <li><a href="https://twitter.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-twitter"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-card__border">
                        <img src="img/about/aldino.jpeg" alt="Aldino" class="team-card__img">
                    </div>
                    <h3 class="team-card__name">Aldino Damas</h3>
                    <span class="team-card__profession">Customer Relations</span>
                    <div class="team-card__social">
                        <ul class="team-card__social-list">
                            <li><a href="https://facebook.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <li><a href="https://instagram.com/aldinnoo" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-instagram"></i>
                                </a></li>
                            <li><a href="https://twitter.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-twitter"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Team Member 5 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-card__border">
                        <img src="img/about/reno.jpeg" alt="Reno" class="team-card__img">
                    </div>
                    <h3 class="team-card__name">Reno Oktavian</h3>
                    <span class="team-card__profession">Customer Relations</span>
                    <div class="team-card__social">
                        <ul class="team-card__social-list">
                            <li><a href="https://facebook.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <li><a href="https://instagram.com/rathenhi" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-instagram"></i>
                                </a></li>
                            <li><a href="https://twitter.com/" target="_blank" class="team-card__social-link">
                                    <i class="fab fa-twitter"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <li><a href="shop2?category=new-arrivals">New Arrivals</a></li>
                        <li><a href="shop2?category=clothing">Clothing</a></li>
                        <li><a href="shop2?category=accessories">Accessories</a></li>
                        <li><a href="shop2?category=sale">Sale</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h5>Customer Service</h5>
                    <ul>
                        <li><a href="contact">Contact Us</a></li>
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

    <!-- JavaScript (Sama seperti landing.html, ditambah AOS init) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi AOS
            AOS.init({
                duration: 800, // Durasi animasi
                once: true,    // Animasi hanya terjadi sekali
                offset: 100,   // Offset sebelum animasi dimulai
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