<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Shop Our Collection">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Shop, Products, Minimalist">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DariMata Studio - Shop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Profile Dropdown Modern Update */

        .auth-buttons {
    display: flex;
    align-items: center;
    margin-left: 20px;
    
}

.noUi-horizontal .noUi-handle {
            background: #007bff; /* Warna biru */
            border-radius: 10px; /* Membuat handle lebih bulat */
            border: 1px solid #007bff; /* Warna border sama dengan background */
        }

        .noUi-horizontal .noUi-connect {
            background: #007bff; /* Warna biru untuk bagian yang terhubung */
        }

        .noUi-target {
            border-radius: 8px; /* Membuat track slider lebih bulat */
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
        /* Shop Page Layout */
        .shop-page {
            padding: 2rem 0;
        }

        .shop-page-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 1.5rem;
            padding: 1rem 0;
        }

        /* Filter Sidebar */
        .filter-sidebar {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            position: sticky;
            top: 100px;
            max-height: calc(66vh - 90px);
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .filter-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .filter-sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 3px;
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #eee;
        }

        .filter-header h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-color);
        }

        .clear-all {
            font-size: 0.8rem;
            color: var(--text-light-color);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 600;
        }

        .clear-all:hover {
            color: var(--primary-color);
        }

        .filter-group {
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 1.5rem;
        }

        .filter-group:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .filter-title {
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            padding: 0.4rem 0;
            user-select: none;
            transition: color 0.2s ease;
        }

        .filter-title:hover {
            color: var(--primary-color);
        }

        .filter-title::after {
            content: '\002B';
            font-family: 'FontAwesome';
            font-size: 0.9rem;
            font-weight: 900;
            transition: var(--transition);
            color: var(--text-light-color);
        }

        .filter-title.active::after {
            content: '\2212';
        }

        .filter-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out, padding 0.3s ease-in-out;
        }

        .filter-list.active {
            max-height: 400px;
            padding-top: 0.4rem;
            padding-bottom: 0.4rem;
        }

        .filter-list li {
            margin-bottom: 0.4rem;
        }

        .filter-list li a {
            color: var(--text-light-color);
            text-decoration: none;
            font-size: 0.875rem;
            transition: var(--transition);
            display: block;
            padding: 0.4rem 0.2rem;
            border-radius: 3px;
        }

        .filter-list li a:hover,
        .filter-list li a.active {
            color: var(--primary-color);
            background-color: #f0f2ff;
            padding-left: 0.6rem;
        }

        .price-range-container {
            padding: 0.75rem 0;
        }

        .price-range-slider {
            width: 100%;
            height: 6px;
            background: #e0e0e0;
            border-radius: 3px;
            outline: none;
            margin: 0.75rem 0;
            transition: background 0.2s ease;
        }

        .price-range-slider:hover {
            background: #d0d0d0;
        }

        .price-range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--primary-color);
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 0 5px rgba(1, 24, 216, 0.3);
        }

        .price-range-slider::-webkit-slider-thumb:hover {
            transform: scale(1.2);
            box-shadow: 0 0 8px rgba(1, 24, 216, 0.4);
        }

        .price-values {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            color: var(--text-light-color);
            margin-top: 0.5rem;
        }

        .color-options {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            padding-top: 0.4rem;
        }

        .color-option {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            display: block;
            border: 2px solid #f0f0f0;
            transition: all 0.2s ease;
            cursor: pointer;
            position: relative;
        }

        .color-option:hover {
            transform: scale(1.15);
            border-color: #ccc;
        }

        .color-option.active {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px var(--primary-color);
        }

        .color-option.active::after {
            content: '\f00c';
            font-family: 'FontAwesome';
            position: absolute;
            color: var(--primary-color);
            font-size: 0.75rem;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-shadow: 0 0 2px rgba(255, 255, 255, 0.6);
        }

        .color-option[style*="background: #404a47"].active::after,
        .color-option[style*="background: #111"].active::after {
            color: white;
        }

        /* Products Container */
        .products-container {
            flex-grow: 1;
        }

        /* Shop Controls */
        .shop-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.8rem;
            padding: 1rem;
            background-color: #fff;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 90px;
            z-index: 990;
        }

        .search-filter {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            flex-grow: 1;
        }

        .search-box {
            position: relative;
            flex-grow: 1;
        }

        .search-box input {
            width: 100%;
            padding: 0.6rem 0.8rem 0.6rem 2.5rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            transition: var(--transition);
            font-size: 0.875rem;
        }

        .search-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(1, 24, 216, 0.1);
        }

        .search-box i.fas.fa-search {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light-color);
            font-size: 0.9rem;
        }

        .filter-toggle {
            display: none;
            background: white;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            padding: 0.6rem 0.8rem;
            font-weight: 600;
            color: var(--text-color);
            cursor: pointer;
            transition: var(--transition);
            align-items: center;
            font-size: 0.875rem;
        }

        .filter-toggle:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background-color: #f0f2ff;
        }

        .filter-toggle i.fas.fa-filter {
            margin-right: 0.4rem;
            font-size: 0.8rem;
        }

        .sort-options select {
            padding: 0.6rem 0.8rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            transition: var(--transition);
            background-color: white;
            min-width: 180px;
        }

        .sort-options select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(1, 24, 216, 0.1);
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.25rem;
            padding: 0.5rem 0;
        }

        .product-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid #f5f5f5;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: rgba(1, 24, 216, 0.2);
        }

        .product-image {
            position: relative;
            overflow: hidden;
            height: 220px;
            background-size: cover;
            background-position: center;
            background-color: #f8f8f8;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.03);
        }

        .product-label {
            position: absolute;
            left: 0.75rem;
            top: 0.75rem;
            z-index: 2;
            padding: 0.2rem 0.6rem;
            font-size: 0.7rem;
            font-weight: 700;
            border-radius: 3px;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .label-new {
            background: var(--primary-color);
        }

        .label-sale {
            background: var(--secondary-color);
        }

        .label-best {
            background: #4CAF50;
        }

        .product-actions {
            position: absolute;
            right: 0.75rem;
            top: 0.75rem;
            opacity: 0;
            transform: translateY(8px);
            transition: var(--transition);
            z-index: 3;
        }

        .product-card:hover .product-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .product-actions li {
            margin-bottom: 0.4rem;
            list-style: none;
        }

        .product-actions li a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            color: var(--text-light-color);
            font-size: 0.9rem;
        }

        .product-actions li a:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.05);
        }

        .product-content {
            padding: 0.9rem;
            position: relative;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding-bottom: 3.2rem;
        }

        .product-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            transition: var(--transition);
            line-height: 1.35;
            min-height: 2.4em;
        }

        .product-card:hover .product-title {
            color: var(--primary-color);
        }

        .add-to-cart-btn {
            position: absolute;
            left: 0.9rem;
            right: 0.9rem;
            bottom: 0.9rem;
            opacity: 0;
            transform: translateY(8px);
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary-color);
            transition: opacity 0.25s ease, transform 0.25s ease;
            background: white;
            padding: 0.5rem 0.8rem;
            border-radius: var(--border-radius);
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.08);
            text-decoration: none;
            text-align: center;
            z-index: 3;
            border: 1px solid var(--primary-color);
        }

        .product-card:hover .add-to-cart-btn {
            opacity: 1;
            transform: translateY(0);
        }

        .product-card:hover .add-to-cart-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .product-rating {
            margin-bottom: 0.5rem;
            color: #f7941d;
            font-size: 0.75rem;
        }

        .product-price {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0;
            margin-top: auto;
        }

        .old-price {
            text-decoration: line-through;
            color: #b7b7b7;
            font-size: 0.75rem;
            margin-right: 0.4rem;
        }

        .color-selector {
            display: flex;
            gap: 0.4rem;
            margin-top: 0.75rem;
        }

        .color-selector label {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            border: 1px solid #eee;
            transition: var(--transition);
        }

        .color-selector label:hover {
            transform: scale(1.15);
        }

        .color-selector label.active {
            border-color: #333;
            box-shadow: 0 0 0 1.5px #333;
        }

        /* Tambahkan ini ke dalam style.css atau bagian style di HTML */
        .product-actions-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 1rem;
            width: 100%;
        }

        .btn-cart-icon {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 12px rgba(1, 24, 216, 0.15);
            margin-bottom: -40px;
        }

        .btn-checkout {
            flex-grow: 1;
            min-width: 180px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: 24px;
            padding: 0 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(1, 24, 216, 0.1);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: -40px;
            padding-left: 1.5em;
            padding-right: 1.5em;
        }

        /* Efek hover dan active */
        .btn-cart-icon:hover,
        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(1, 24, 216, 0.2);
        }

        .btn-cart-icon:active,
        .btn-checkout:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(1, 24, 216, 0.15);
        }

        .btn-checkout:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .product-actions-row {
                gap: 0.6rem;
            }

            .btn-cart-icon {
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }

            .btn-checkout {
                height: 36px;
                font-size: 0.8rem;
                padding: 0 0.8rem;
            }
        }

        @media (max-width: 767px) {
            .product-actions-row {
                margin-top: 0.8rem;
            }

            .btn-cart-icon {
                width: 34px;
                height: 34px;
            }

            .btn-checkout {
                height: 34px;
                font-size: 0.75rem;
            }
        }

        @media (max-width: 480px) {
            .btn-cart-icon {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }

            .btn-checkout {
                height: 32px;
                font-size: 0.7rem;
                padding: 0 0.6rem;
            }
        }


        /* Product Pagination */
        .product-pagination {
            margin-top: 2.5rem;
            text-align: center;
        }

        .product-pagination a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: var(--border-radius);
            margin: 0 0.2rem;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-light-color);
            text-decoration: none;
            transition: var(--transition);
            border: 1px solid #ddd;
        }

        .product-pagination a:hover {
            background: #f0f2ff;
            border-color: var(--secondary-color);
            color: var(--primary-color);
        }

        .product-pagination a.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .product-pagination span {
            padding: 0 0.4rem;
            color: var(--text-light-color);
        }

        /* Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem 1rem;
            background-color: #fff;
            border-radius: var(--border-radius);
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            margin-top: 1rem;
        }

        .empty-state img {
            max-width: 180px;
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-state h4 {
            font-size: 1.1rem;
            color: var(--text-color);
            margin-bottom: 0.75rem;
        }

        .empty-state p {
            color: var(--text-light-color);
            margin-bottom: 1.25rem;
            max-width: 350px;
            margin-left: auto;
            margin-right: auto;
            font-size: 0.9rem;
        }

        .empty-state .primary-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.6rem 1.2rem;
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: var(--transition);
            font-weight: 600;
            font-size: 0.85rem;
        }

        .empty-state .primary-btn:hover {
            background-color: var(--secondary-color);
        }

        /* Filter Overlay for Mobile */
        .filter-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1040;
        }

        .filter-overlay.active {
            display: block;
        }

        /* Responsive Adjustments */
        @media (max-width: 991px) {
            .shop-page-container {
                grid-template-columns: 1fr;
            }

            .filter-sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                width: 260px;
                height: 100%;
                z-index: 1050;
                transition: left 0.3s ease;
                margin-bottom: 0;
                box-shadow: 3px 0 12px rgba(0, 0, 0, 0.1);
            }

            .filter-sidebar.active {
                left: 0;
            }

            .filter-toggle {
                display: inline-flex;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            }

            .product-image {
                height: 210px;
            }
        }

        @media (max-width: 767px) {
            .shop-controls {
                flex-direction: column;
                align-items: stretch;
                top: 80px;
            }

            .search-filter {
                width: 100%;
                justify-content: space-between;
            }

            .search-box {
                flex-grow: 1;
                max-width: none;
            }

            .sort-options,
            .sort-options select {
                width: 100%;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
                gap: 0.75rem;
            }

            .product-image {
                height: 170px;
            }

            .product-content {
                padding: 0.75rem;
                padding-bottom: 3rem;
            }

            .product-title {
                font-size: 0.8rem;
                min-height: 2.2em;
            }

            .add-to-cart-btn {
                font-size: 0.7rem;
                padding: 0.4rem 0.6rem;
                left: 0.75rem;
                right: 0.75rem;
                bottom: 0.75rem;
            }

            .product-price {
                font-size: 0.9rem;
            }

            .product-pagination a {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .product-image {
                height: 160px;
            }

            .product-title {
                font-size: 0.75rem;
            }
        }

        .shop-pagination { display: flex; justify-content: center; margin: 2.5rem 0 1.5rem 0; }
        .shop-pagination nav { display: inline-block; }
        .shop-pagination .pagination { display: flex; flex-wrap: wrap; gap: 0.2em; border-radius: 8px; overflow: visible; box-shadow: 0 1px 8px rgba(1,24,216,0.04); background: none; padding: 0; }
        .shop-pagination .page-item { display: flex; }
        .shop-pagination .page-link { color: #0118d8; font-weight: 600; border: none; background: #f7f7f7; margin: 0 2px; border-radius: 6px; transition: background 0.2s, color 0.2s; min-width: 36px; min-height: 36px; display: flex; align-items: center; justify-content: center; font-size: 1.08em; }
        .shop-pagination .page-link:hover, .shop-pagination .page-item.active .page-link { background: #0118d8; color: #fff; }
        .shop-pagination .page-item.disabled .page-link { color: #bbb; background: #f7f7f7; cursor: not-allowed; }

        /* Checkout Button Modern Full Width */
        .product-card .checkout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.85em 0;
            font-size: 1.08em;
            font-weight: 700;
            border-radius: 2em;
            background: #0118d8;
            color: #fff;
            border: none;
            box-shadow: 0 1px 8px rgba(1,24,216,0.04);
            margin-top: 0.7em;
            margin-bottom: 0.2em;
            transition: background 0.2s, color 0.2s;
            gap: 0.7em;
        }
        .product-card .checkout-btn:hover, .product-card .checkout-btn:focus {
            background: #fff;
            color: #0118d8;
            border: 2px solid #0118d8;
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('partials.header')


    <!-- Mobile Navigation (Disalin dari /.html) -->
    <div class="mobile-nav" id="mobileNav">
        <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close menu">&times;</button>
        <form class="header-search mobile-search" action="/search" method="GET" style="margin: 20px 0; width: 100%;">
            <input type="search" name="q" placeholder="Search products..." aria-label="Search">
            <button type="submit" aria-label="Submit search"><i class="fas fa-search"></i></button>
        </form>
        <ul>
            <li><a href="/">Home</a></li> <!-- Link ke landing.html -->
            <li class="active"><a href="shop2">Shop</a></li> <!-- Link 'Shop' aktif -->
            <li><a href="about">About Us</a></li>
            <li><a href="contact">Contact</a></li>
            <li>
                <hr style="margin: 15px 0; border-color: var(--border-color);">
            </li>
            <li><a href="user-profile">My Account</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
    <section class="shop-main-content-placeholder">
        <div class="container">
            <h2>.</h2>
            <h1>Our Products</h1>
            <p>This is where your shop's main content, product grid, and filters will go.</p>

            <div class="shop-page-container">
                <!-- Filter Sidebar -->
                <aside class="filter-sidebar">
                    <div class="filter-header">
                        <h4>FILTERS</h4>
                        <a href="#" class="clear-all">Clear all</a>
                    </div>

                    <div class="filter-group">
                        <h5 class="filter-title active">Categories</h5>
                        <ul class="filter-list active">
                        {{-- Tombol untuk menampilkan semua produk --}}
                        <li><a href="{{ route('shop2') }}" class="control {{ !request('category') ? 'active' : '' }}">All Products</a></li>

                        {{-- Looping untuk setiap kategori dari database --}}
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('shop2', ['category' => $category->slug]) }}"
                            {{-- Tambahkan class 'active' jika slug kategori sama dengan parameter di URL --}}
                            class="{{ request('category') == $category->slug ? 'active' : '' }}">
            
                            {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                        </ul>
                    </div>

                    <div class="filter-group">
    <h5 class="filter-title active">Price Range</h5>
    <div class="filter-list price-range-container active">
        <div id="price-slider" style="margin: 20px 5px 25px;"></div> 

        <div class="price-values">
            <span id="priceMinDisplay"></span>
            <span id="priceMaxDisplay"></span>
        </div>
    </div>
</div>
                </aside>

                <!-- Products Container -->
                <div class="products-container">
                    <div class="shop-controls">
                        <form action="" method="get" style="display: flex; align-items: center; gap: 0.8rem; flex-grow: 1;">
                            <button class="filter-toggle" type="button">
                                <i class="fas fa-filter"></i> Filters
                            </button>
                            <div class="search-box" style="flex-grow:1;">
                                <i class="fas fa-search"></i>
                                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search products..." style="width:100%; padding:0.6rem 0.8rem 0.6rem 2.5rem; border:1px solid #ddd; border-radius:2em; font-size:0.875rem;">
                            </div>
                        </form>
                        <div class="sort-options">
                            <select id="sortProducts">
                                <option value="default:asc">Sort by: Featured</option>
                                <option value="price:asc">Price: Low to High</option>
                                <option value="price:desc">Price: High to Low</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="product-grid">
                    @foreach ($products as $product)
                    {{-- Mengambil data yang diperlukan dari varian pertama untuk tampilan awal --}}
                    @php
                        $variant = $product->variants->first();
                    @endphp

                        <div class="product-card mix {{ $product->category?->slug }}" 
                            data-price="{{ $variant?->price ?? 0 }}" 
                            data-date="{{ $product->date?->toDateString() }}"
                            data-color-names="{{ $product->variants->pluck('color_name')->implode(' ') }}">

                        @php
                        // Coba ambil gambar utama. Jika tidak ada, ambil gambar pertama dari semua gambar.
                        $displayImage = $product->primaryImage?->image_path ?? $product->images->first()?->image_path;
                        @endphp

                        <div class="product-image set-bg" data-setbg="{{ asset($displayImage) }}">
                
                        <ul class="product-actions">
                        <li>
                            @php $isWishlisted = in_array($product->id, $wishlistProductIds ?? []); @endphp
                            @if($isWishlisted)
                                <form action="/wishlist/remove" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn-wishlist-toggle active" aria-label="Remove from Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </form>
                            @else
                                <form action="/wishlist/add" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn-wishlist-toggle" aria-label="Add to Wishlist">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </form>
                            @endif
                        </li>
                        <li><a href="{{ route('product.details', $product->slug) }}" title="Quick View" aria-label="Quick View"><i class="far fa-eye"></i></a></li>
                        </ul>
                        </div>

            <div class="product-content">
                <h6 class="product-title"><a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a></h6>
                
                <div class="product-rating">
                    {{-- Asumsi 'rating' adalah angka tunggal, bukan array --}}
                    <x-star-rating :rating="$product->rating" />
                </div>

                <h5 class="product-price">
                    {{-- Tampilkan harga dari varian pertama, format dengan benar --}}
                    Rp{{ number_format($variant?->price ?? 0, 0, ',', '.') }}
                </h5>

                <div class="color-selector">
                    {{-- Loop langsung pada relasi variants untuk menampilkan warna --}}
                    @foreach ($product->variants as $variant)
                        @if($variant->color_hex)
                            <label style="background: {{ $variant->color_hex }}; {{ $variant->color_hex == '#ffffff' ? 'border: 1px solid #ddd;' : '' }}"
                                   data-color="{{ $variant->color_hex }}"
                                   title="{{ $variant->color_name }}">
                            </label>
                        @endif
                    @endforeach
                </div>

                        <div class="product-actions-row">
                            {{-- Form ini sekarang membungkus tombol ikon keranjang --}}
                            <form action="{{ route('cart.add') }}" method="POST" style="display:inline;">
                                @csrf
                                @if($variant)
                                    <input type="hidden" name="variant_id" value="{{ $variant->id }}">
                                    <button type="submit" class="btn-cart-icon" title="Add to Cart">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                @else
                                    <input type="hidden" name="variant_id" value="">
                                    <button type="button" class="btn-cart-icon btn-secondary" title="No Variant" disabled>
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                @endif
                            </form>

                            {{-- Tombol checkout diubah menjadi form agar bisa kirim parameter buy now --}}
                            <form action="/checkout" method="GET" style="display:inline;">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="variant_id" value="{{ $variant?->id }}">
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" class="btn-checkout">Checkout</button>
                            </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

                    

                    <div class="shop-pagination">{{ $products->withQueryString()->links() }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (Sama seperti landing.html) -->
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const profileIconContainer = document.getElementById('profileIconContainer');
            const profileDropdownMenu = document.getElementById('profileDropdownMenu');

            if (profileIconContainer && profileDropdownMenu) {
                profileIconContainer.addEventListener('click', function (event) {
                    event.stopPropagation();
                    profileDropdownMenu.classList.toggle('active');
                });
                document.addEventListener('click', function (event) {
                    if (!profileIconContainer.contains(event.target) && !profileDropdownMenu.contains(event.target)) {
                        profileDropdownMenu.classList.remove('active');
                    }
                });
            }

            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileNav = document.getElementById('mobileNav');
            const mobileNavClose = document.getElementById('mobileNavClose');
            const mobileNavOverlay = document.getElementById('mobileNavOverlay');

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

            const currentYearSpan = document.getElementById('currentYear');
            if (currentYearSpan) {
                currentYearSpan.textContent = new Date().getFullYear();
            }

            const searchForms = document.querySelectorAll('.header-search');
            searchForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const query = form.querySelector('input[type="search"]').value;
                    if (query.trim() !== '') {
                        // Untuk shop2, Anda mungkin ingin mengarahkan ke halaman shop dengan parameter query
                        // window.location.href = '/shop2?search=' + encodeURIComponent(query);
                        // untuk filter dan produk shop2 di sini
                        console.log("Searching for: " + query + " on shop page.");
                    }
                });
            });

            function updateUserProfileImage(imageUrl) {
                const profileIconWrapper = document.querySelector('.profile-icon-wrapper');
                if (profileIconWrapper) {
                    profileIconWrapper.innerHTML = `<img src="${imageUrl}" alt="User Profile">`;
                }
            }
            // fungsi ini setelah user login berhasil
            // Contoh:
            // if (userIsLoggedIn) {
            //     updateUserProfileImage('path/to/user-avatar.jpg');
            // }

            // untuk filter dan produk shop2 di sini
            // atau bisa memuatnya dari file eksternal.
            console.log("Shop page JavaScript loaded. Implement your product filtering and display logic here.");

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Menambahkan efek klik untuk tombol cart dan checkout
            document.querySelectorAll('.btn-cart-icon, .btn-checkout').forEach(button => {
                button.addEventListener('click', function (e) {
                    // Jika ingin mencegah aksi default (misalnya untuk demo)
                    // e.preventDefault();

                    // Tambahkan efek loading
                    this.classList.add('loading');

                    // Simulasi proses async (misalnya add to cart atau checkout)
                    setTimeout(() => {
                        this.classList.remove('loading');

                        // Untuk tombol cart, bisa tambahkan notifikasi
                        if (this.classList.contains('btn-cart-icon')) {
                            // Update counter cart
                            const cartCount = document.querySelector('.cart-count-badge');
                            if (cartCount) {
                                const currentCount = parseInt(cartCount.textContent) || 0;
                                cartCount.textContent = currentCount + 1;
                                cartCount.classList.add('pulse');

                                // Hapus class pulse setelah animasi selesai
                                setTimeout(() => {
                                    cartCount.classList.remove('pulse');
                                }, 500);
                            }

                            // Tampilkan notifikasi toast
                            showToast('Item added to cart');
                        }
                    }, 1000);
                });
            });

            // Fungsi untuk menampilkan notifikasi toast
            function showToast(message) {
                const toast = document.createElement('div');
                toast.className = 'toast-notification';
                toast.textContent = message;
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.classList.add('show');
                }, 10);

                setTimeout(() => {
                    toast.classList.remove('show');
                    setTimeout(() => {
                        document.body.removeChild(toast);
                    }, 300);
                }, 3000);
            }
        });
    </script>

    <!--Fungsi Menampilkan Gambar-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.set-bg').forEach(function (el) {
                const bg = el.getAttribute('data-setbg');
                if (bg) {
                    el.style.backgroundImage = 'url("' + bg + '")';
                }
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

<script src="https://cdn.jsdelivr.net/npm/mixitup@3.3.1/dist/mixitup.min.js"></script>

<!-- Tambahkan script wishlist toggle -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-wishlist-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            var isActive = this.classList.contains('active');
            var url = isActive ? '/wishlist/remove' : '/wishlist/add';
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    this.classList.toggle('active');
                    this.querySelector('i').classList.toggle('fas');
                    this.querySelector('i').classList.toggle('far');
                } else if (data.error === 'Unauthorized') {
                    window.location.href = '/login';
                }
            });
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const priceSlider = document.getElementById('price-slider');
    
    if (!priceSlider) {
        // Jika elemen tidak ditemukan, hentikan eksekusi script
        console.error('Elemen #price-slider tidak ditemukan. Slider tidak dapat dibuat.');
        return;
    }

    const minPriceDisplay = document.getElementById('priceMinDisplay');
    const maxPriceDisplay = document.getElementById('priceMaxDisplay');

    const urlParams = new URLSearchParams(window.location.search);
    const currentMinPrice = parseInt(urlParams.get('min_price')) || 50000;
    const currentMaxPrice = parseInt(urlParams.get('max_price')) || 500000;

    noUiSlider.create(priceSlider, {
        start: [currentMinPrice, currentMaxPrice],
        connect: true,
        step: 10000,
        range: {
            'min': 50000,
            'max': 500000
        },
        format: {
            to: function (value) {
                return 'Rp' + Math.round(value).toLocaleString('id-ID');
            },
            from: function (value) {
                return Number(value.replace('Rp', '').replace(/\./g, ''));
            }
        }
    });

    priceSlider.noUiSlider.on('update', function (values) {
        minPriceDisplay.innerHTML = values[0];
        maxPriceDisplay.innerHTML = values[1];
    });

    priceSlider.noUiSlider.on('change', function (values) {
        const minPrice = priceSlider.noUiSlider.get(true)[0];
        const maxPrice = priceSlider.noUiSlider.get(true)[1];
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('min_price', minPrice);
        currentUrl.searchParams.set('max_price', maxPrice);
        window.location.href = currentUrl.toString();
    });
});
</script>
</body>
</html>