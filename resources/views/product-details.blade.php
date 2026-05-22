<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Detail Produk">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Detail Produk, Minimalist">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk - DariMata Studio</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Lightbox/Gallery CSS (Contoh: basicLightbox) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/basiclightbox@5.0.4/dist/basicLightbox.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <style>
        /* Product Details Page Styles */
        .product-details-section {
            padding: 40px 0;
            background-color: var(--background-color);
            /* Putih untuk konten utama */
        }

        .product-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Dua kolom: gambar dan info */
            gap: 30px;
        }

        /* Update Product Gallery */
        .product-gallery {
            position: relative;
        }

        .main-product-image {
            border-radius: var(--border-radius);
            overflow: hidden;
            margin-bottom: 20px;
            transition: var(--transition);
            background-color: #f9f9f9;
        }

        .main-product-image:hover {
            box-shadow: var(--box-shadow);
        }

        .main-product-image img {
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 1;
            object-fit: contain;
            /* Ubah ke contain untuk tampilan lebih baik */
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }

        .main-product-image:hover img {
            transform: scale(1.02);
        }

        .product-thumbnails {
            display: flex;
            gap: 12px;
            padding-bottom: 8px;
            /* Untuk scrollbar */
            scrollbar-width: thin;
            scrollbar-color: var(--border-color) transparent;
        }

        .product-thumbnails::-webkit-scrollbar {
            height: 4px;
        }

        .product-thumbnails::-webkit-scrollbar-thumb {
            background-color: var(--border-color);
            border-radius: 2px;
        }

        .thumbnail-item {
            width: 80px;
            height: 80px;
            min-width: 80px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            background-color: #f9f9f9;
        }

        .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: var(--transition);
        }

        .thumbnail-item.active,
        .thumbnail-item:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Update Product Info */
        .product-info {
            padding: 0 0 0 20px;
        }

        .product-title-detail {
            font-size: 2rem;
            font-weight: 800;
            /* Lebih tebal */
            margin-bottom: 12px;
            color: var(--text-color);
            line-height: 1.2;
        }

        .product-rating-detail {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            font-size: 0.95rem;
            color: lawngreen;
        }

        .product-rating-detail i {
            margin-right: 3px;
            font-size: 1.1rem;
        }

        .product-rating-detail span {
            margin-left: 8px;
            color: var(--text-light-color);
            font-weight: 500;
        }

        .product-price-detail {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .product-price-detail .old-price-detail {
            font-size: 1.2rem;
            color: var(--text-light-color);
            text-decoration: line-through;
            margin-left: 12px;
            font-weight: 500;
        }

        .product-short-description {
            font-size: 1rem;
            color: var(--text-light-color);
            margin-bottom: 24px;
            line-height: 1.7;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border-color);
        }

        /* Update Product Options */
        .option-group {
            margin-bottom: 24px;
        }

        .option-label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.95rem;
            color: var(--text-color);
        }

        .size-options,
        .color-options-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .size-option {
            padding: 8px 18px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: var(--transition);
            background-color: var(--background-color);
            font-weight: 500;
        }

        .size-option:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .size-option.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .color-option-detail {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid transparent;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .color-option-detail::after {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 50%;
            border: 1px solid transparent;
            transition: var(--transition);
        }

        .color-option-detail:hover::after,
        .color-option-detail.active::after {
            border-color: var(--primary-color);
        }

        .color-option-detail.active {
            transform: scale(1.1);
        }

        /* Update Quantity  */
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .quantity-input-group {
            display: flex;
            align-items: center;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            margin-left: 10px;
            overflow: hidden;
        }

        .quantity-input-group button {
            background-color: var(--light-gray-color);
            border: none;
            color: var(--text-color);
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-input-group button:hover {
            background-color: #e9ecef;
            color: var(--primary-color);
        }

        .quantity-input-group input[type="number"] {
            width: 50px;
            text-align: center;
            border: none;
            padding: 10px 0;
            font-size: 1rem;
            font-weight: 600;
            border-left: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
        }

        /* Update Product Actions */
        .product-actions-detail {
            display: flex;
            gap: 14px;
            margin-bottom: 25px;
            align-items: center;
            justify-content: flex-start;
        }

        .product-actions-detail .btn-cart-icon {
            background: #fff;
            border: 1.5px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: background 0.2s, color 0.2s, border 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 8px rgba(1, 24, 216, 0.08);
            padding: 0;
        }

        .product-actions-detail .btn-cart-icon:hover,
        .product-actions-detail .btn-cart-icon:focus {
            background: var(--primary-color);
            color: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 2px 12px rgba(1, 24, 216, 0.15);
        }

        .product-actions-detail .btn-checkout-long {
            flex: 1 1 auto;
            background: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 24px;
            padding: 14px 0;
            font-weight: 700;
            text-align: center;
            font-size: 1rem;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, border 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 120px;
            max-width: 100%;
            box-shadow: 0 1px 8px rgba(1, 24, 216, 0.08);
            letter-spacing: 0.5px;
        }

        .product-actions-detail .btn-checkout-long:hover,
        .product-actions-detail .btn-checkout-long:focus {
            background: #fff;
            color: var(--primary-color);
            border: 1.5px solid var(--primary-color);
        }

        .product-actions-detail .btn-wishlist-circle {
            background: #fff;
            border: 1.5px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: background 0.2s, color 0.2s, border 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 8px rgba(1, 24, 216, 0.08);
            padding: 0;
        }

        .product-actions-detail .btn-wishlist-circle:hover,
        .product-actions-detail .btn-wishlist-circle:focus {
            background: var(--primary-color);
            color: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 2px 12px rgba(1, 24, 216, 0.15);
        }

        @media (max-width: 767px) {
            .product-actions-detail {
                flex-direction: column;
                gap: 10px;
                align-items: stretch;
            }

            .product-actions-detail .btn-checkout-long {
                width: 100%;
                border-radius: 14px;
                min-width: unset;
            }

            .product-actions-detail .btn-cart-icon,
            .product-actions-detail .btn-wishlist-circle {
                width: 44px;
                height: 44px;
                margin: 0 auto;
            }
        }

        @media (max-width: 480px) {
            .product-actions-detail .btn-checkout-long {
                font-size: 0.95rem;
                padding: 12px 0;
            }

            .product-actions-detail .btn-cart-icon,
            .product-actions-detail .btn-wishlist-circle {
                width: 38px;
                height: 38px;
                font-size: 1.1rem;
            }
        }

        /* Modern Product Tabs */
        .product-tabs { margin-top: 2.2rem; }
        .product-tabs .tab-menu {
            display: flex;
            gap: 2px;
            background: #f7f7f7;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 0;
        }
        .product-tabs .tab-btn {
            border: none;
            background: none;
            color: #888;
            font-weight: 600;
            font-size: 1.08rem;
            padding: 0.9rem 2.2rem;
            border-radius: 0;
            transition: background 0.2s, color 0.2s;
            cursor: pointer;
        }
        .product-tabs .tab-btn.active, .product-tabs .tab-btn:focus {
            background: #0118d8;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .product-tabs .tab-btn:not(.active):hover {
            background: #e9e9e9;
            color: #0118d8;
        }
        .product-tabs .tab-content-area {
            background: #fff;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 12px rgba(1,24,216,0.04);
            padding: 2.2rem 2rem 2rem 2rem;
            margin-top: -2px;
            min-height: 220px;
        }
        .product-tabs .tab-pane { display: none; }
        .product-tabs .tab-pane.active { display: block; animation: fadeInTab 0.3s; }
        @keyframes fadeInTab { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 700px) {
            .product-tabs .tab-btn { font-size: 0.98rem; padding: 0.7rem 1.1rem; }
            .product-tabs .tab-content-area { padding: 1.2rem 0.7rem; }
        }
        /* Modern Review List */
        .modern-reviews-list { margin: 0; padding: 0; list-style: none; }
        .modern-reviews-list li { border-bottom: 1px solid #f0f0f0; padding: 1.2rem 0; margin-bottom: 0.5rem; display: flex; flex-direction: column; gap: 0.3rem; }
        .modern-reviews-list li:last-child { border-bottom: none; }
        .review-header { display: flex; align-items: center; gap: 12px; margin-bottom: 0.2rem; }
        .review-user { font-weight: 700; color: #222; font-size: 1.05em; }
        .review-date { color: #888; font-size: 0.93em; }
        .review-comment { color: #333; font-size: 1.01em; margin-top: 0.2em; }
        .review-stars { display: flex; align-items: center; gap: 2px; }
        @media (max-width: 600px) {
            .modern-reviews-list li { padding: 0.8rem 0; }
            .review-header { flex-direction: column; align-items: flex-start; gap: 4px; }
        }
        /* Modern Description Styling */
        .desc-title { font-size: 1.25rem; font-weight: 700; color: #222; margin-bottom: 0.7rem; letter-spacing: 0.2px; }
        .desc-main { color: #444; font-size: 1.07rem; line-height: 1.7; margin-bottom: 1.2rem; }
        .desc-features { margin: 0 0 1.2rem 0; padding: 0; list-style: none; }
        .desc-features li { position: relative; padding-left: 1.5em; margin-bottom: 0.5em; color: #333; font-size: 1.04rem; }
        .desc-features li::before { content: ''; position: absolute; left: 0; top: 0.6em; width: 0.7em; height: 0.7em; border-radius: 50%; background: #0118d8; }

        /* Update Related Products */
        .related-products-section {
            padding: 60px 0;
            background-color: var(--light-gray-color);
        }

        .related-products-section h3 {
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            color: var(--text-color);
            position: relative;
            padding-bottom: 15px;
        }

        .related-products-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .related-products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
        }

        .product-card {
            background-color: var(--background-color);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
            box-shadow: var(--box-shadow);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .product-image {
            height: 220px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #f9f9f9;
            position: relative;
            overflow: hidden;
        }

        .product-content {
            padding: 18px;
        }

        .product-title {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .product-title a {
            color: inherit;
            transition: var(--transition);
        }

        .product-title a:hover {
            color: var(--primary-color);
        }

        .product-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-color);
        }


        /* Responsive Updates */
        @media (max-width: 991px) {
            .product-details-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .product-info {
                padding: 0;
            }

            .product-title-detail {
                font-size: 1.8rem;
            }

            .product-price-detail {
                font-size: 1.6rem;
            }

            .related-products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 767px) {
            .product-title-detail {
                font-size: 1.6rem;
            }

            .product-price-detail {
                font-size: 1.4rem;
            }

            .thumbnail-item {
                width: 70px;
                height: 70px;
            }

            .product-actions-detail {
                flex-direction: column;
            }

            .product-actions-detail .btn,
            .product-actions-detail .btn-checkout-detail,
            .product-actions-detail .btn-wishlist-circle {
                width: 100%;
                border-radius: 12px;
            }

            .product-actions-detail .btn-wishlist-circle {
                max-width: 52px;
                margin: 0 auto;
                border-radius: 50%;
            }

            .related-products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .tab-content {
                padding: 20px;
            }

            .nav-tabs .nav-link {
                padding: 12px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .product-title-detail {
                font-size: 1.4rem;
            }

            .thumbnail-item {
                width: 60px;
                height: 60px;
            }

            .size-option {
                padding: 8px 12px;
            }

            .related-products-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Modern Spec Table Styling */
        .spec-table-wrap { background: #fff; border-radius: 12px; box-shadow: 0 2px 12px rgba(1,24,216,0.04); padding: 1.5rem 1.2rem; margin-bottom: 1.2rem; }
        .spec-table { width: 100%; border-collapse: separate; border-spacing: 0; font-size: 1.04rem; }
        .spec-table th, .spec-table td { padding: 0.7em 1.1em; border-bottom: 1px solid #f0f0f0; }
        .spec-table th { background: #f8f9fa; font-weight: 700; color: #222; width: 32%; border-radius: 8px 0 0 8px; }
        .spec-table td { color: #333; border-radius: 0 8px 8px 0; }
        .spec-table tr:last-child th, .spec-table tr:last-child td { border-bottom: none; }
        @media (max-width: 700px) {
            .spec-table th, .spec-table td { padding: 0.5em 0.5em; font-size: 0.97em; }
        }

        .review-pagination { display: flex; justify-content: center; margin-top: 1.5rem; }
        .review-pagination nav { display: inline-block; }
        .review-pagination .pagination { display: flex; flex-wrap: wrap; gap: 0.2em; border-radius: 8px; overflow: visible; box-shadow: 0 1px 8px rgba(1,24,216,0.04); background: none; padding: 0; }
        .review-pagination .page-item { display: flex; }
        .review-pagination .page-link { color: #0118d8; font-weight: 600; border: none; background: #f7f7f7; margin: 0 2px; border-radius: 6px; transition: background 0.2s, color 0.2s; min-width: 36px; min-height: 36px; display: flex; align-items: center; justify-content: center; font-size: 1.08em; }
        .review-pagination .page-link:hover, .review-pagination .page-item.active .page-link { background: #0118d8; color: #fff; }
        .review-pagination .page-item.disabled .page-link { color: #bbb; background: #f7f7f7; cursor: not-allowed; }
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
            <li class="active"><a href="shop2">Shop</a></li>
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

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-shop"
        style="background-color: var(--light-gray-color); padding: 25px 0; border-bottom: 1px solid var(--border-color);">
        <div class="container">
            <div class="breadcrumb-text" style="text-align: left;">
                <div class="breadcrumb-links" style="font-size: 0.9rem;">
                    <a href="/" style="color: var(--text-light-color);">Home</a>
                    <span style="margin: 0 8px; color: var(--text-light-color);">/</span>
                    <a href="shop2" style="color: var(--text-light-color);">Shop</a>
                    <span style="margin: 0 8px; color: var(--text-light-color);">/</span>
                    <span id="breadcrumbProductName">Product Name</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Details Section -->
    @php
        $tab = request('tab', 'desc');
    @endphp
    @if ($product)
        
   
    <section class="product-details-section">
        <div class="container">
            <div class="product-details-grid">
                <div class="product-gallery">
                    <div class="main-product-image">
                        @php
                        $mainImage = $product->primaryImage?->image_path ?? $product->images->first()?->image_path;
                        @endphp
                        <img src="{{ asset($mainImage) }}" alt="Product Main Image" id="mainProductImg">
                    </div>
                    <div class="product-thumbnails">
                    @foreach($product->images as $image)
                        <div class="thumbnail-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset($image->image_path) }}" alt="Thumbnail {{ $loop->iteration }}">
                        </div>
                    @endforeach
                    </div>
                </div>

                <div class="product-info">
                    <h1 class="product-title-detail" id="productName">{{ $product['name'] }}</h1>
                    <div class="product-rating-detail" id="productRating">
                         <x-star-rating :rating="$product->rating" />
                    </div>
                    <div class="product-price-detail" id="productPrice">
                        Rp{{ number_format($product->variants->first()?->price, 0, ',', '.') }}
                    </div>
                    <p class="product-short-description" id="productShortDescription">
                        {{$product['description']}}
                    </p>

                    <div class="product-options">
                        <div class="option-group">
                            <label class="option-label" for="colorOptions">Color:</label>
                            <div class="color-options-detail" id="colorOptions">
                               @foreach ($product->variants as $variant)

                                {{-- Pastikan varian tersebut punya kode warna untuk ditampilkan --}}
                                @if($variant->color_hex)
                                    <span class="color-option-detail"
                                        style="background: {{ $variant->color_hex }}; {{ $variant->color_hex == '#ffffff' ? 'border: 1px solid #ddd;' : '' }}"
                                        data-color="{{ $variant->color_hex }}"
                                        title="{{ $variant->color_name }}">
                                    </span>
                                @endif
                                @endforeach
                                {{-- <span class="color-option-detail active" style="background-color: #000000;"
                                    data-color="Black" title="Black"></span>
                                
                                <span class="color-option-detail" style="background-color: #003b87;" data-color="Blue"
                                    title="Blue"></span> --}}
                            </div>
                        </div>
                        <div class="option-group">
                            <label class="option-label" for="sizeOptions">Size:</label>
                            <div class="size-options" id="sizeOptions">
                                @foreach ($product->variants as $variant)
                                    <span class="size-option {{ $loop->first ? 'active' : '' }}" data-size="{{ $variant->size }}" data-variant-id="{{ $variant->id }}">{{ $variant->size }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="quantity-selector">
                        <label class="option-label" for="quantity">Quantity:</label>
                        <div class="quantity-input-group">
                            <button type="button" class="quantity-minus" aria-label="Decrease quantity">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" aria-label="Product quantity" readonly style="width:50px; text-align:center;">
                            <button type="button" class="quantity-plus" aria-label="Increase quantity">+</button>
                        </div>
                    </div>

                    <div class="product-actions-detail">
                        <form id="addToCartForm" action="{{ route('cart.add') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="size" id="selectedSizeInput" value="{{ $product->variants->first()->size }}">
                            <input type="hidden" name="qty" id="selectedQtyInput" value="1">
                            <button type="submit" class="btn btn-cart-icon" aria-label="Add to cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                        <form id="checkoutForm" action="{{ route('checkout') }}" method="GET" style="display:inline;">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="variant_id" id="selectedVariantIdInputCheckout" value="{{ $product->variants->first()->id }}">
                            <input type="hidden" name="size" id="selectedSizeInputCheckout" value="{{ $product->variants->first()->size }}">
                            <input type="hidden" name="qty" id="selectedQtyInputCheckout" value="1">
                            <button type="submit" class="btn btn-checkout-long">Checkout</button>
                        </form>
                        @php $isWishlisted = in_array($product->id, $wishlistProductIds ?? []); @endphp
                        @if($isWishlisted)
                            <form action="/wishlist/remove" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-wishlist-circle btn-wishlist-toggle active" aria-label="Remove from Wishlist">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </form>
                        @else
                            <form action="/wishlist/add" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-wishlist-circle btn-wishlist-toggle" aria-label="Add to Wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="product-meta">
                        <span>SKU: <strong id="productSKU">{{ $product->variants->first()->sku }}</strong></span>
                        <span>Category: <a href="shop2?category=boxy-fit-tee" id="productCategoryLink">{{$product->category->name}}</a></span>
                    </div>
                </div>
            </div>

            <div class="product-tabs">
                <div class="tab-menu">
                    <a href="?tab=desc" class="tab-btn{{ $tab == 'desc' ? ' active' : '' }}" id="tab-btn-desc">Description</a>
                    <a href="?tab=spec" class="tab-btn{{ $tab == 'spec' ? ' active' : '' }}" id="tab-btn-spec">Specification</a>
                    <a href="?tab=rev" class="tab-btn{{ $tab == 'rev' ? ' active' : '' }}" id="tab-btn-rev">Reviews ({{ $reviews->count() }})</a>
                </div>
                <div class="tab-content-area">
                    @if($tab == 'desc')
                    <div class="tab-pane active" id="tab-desc">
                        <div class="desc-title">Product Description</div>
                        <div class="desc-main">{{$product['description']}}</div>
                        <div class="desc-title" style="font-size:1.1rem; margin-top:1.5em;">Fitur Utama:</div>
                        <ul class="desc-features">
                            <li>Bahan: 100% Katun Premium Combed 24s</li>
                            <li>Potongan: Boxy Fit (oversized, bahu turun)</li>
                            <li>Sablon: Plastisol Ink, tahan lama dan tidak mudah pecah</li>
                            <li>Jahitan: Rapi dan kuat</li>
                            <li>Cocok untuk: Pria & Wanita (Unisex)</li>
                        </ul>
                    </div>
                    @elseif($tab == 'spec')
                    <div class="tab-pane active" id="tab-spec">
                        <div class="desc-title">Product Specification</div>
                        <div class="spec-table-wrap">
                            <table class="spec-table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Material</th>
                                        <td>100% Premium Cotton Combed 24s</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fit Type</th>
                                        <td>Boxy Fit / Oversized</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Available Sizes</th>
                                        <td>@foreach ($product->variants as $variant)
                                        {{ $variant->size }}{{ !$loop->last ? ', ' : '' }}    
                                        @endforeach</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Print Type</th>
                                        <td>Plastisol Ink Screen Printing</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Care Instructions</th>
                                        <td>Machine wash cold, tumble dry low. Do not bleach. Iron on reverse.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @elseif($tab == 'rev')
                    <div class="tab-pane active" id="tab-rev">
                        <div class="desc-title">Customer Reviews</div>
                        @if($reviews->count())
                            <ul class="modern-reviews-list">
                                @foreach($reviews as $review)
                                    <li>
                                        <div class="review-header">
                                            <span class="review-user">{{ $review->user?->first_name ?? 'User' }}</span>
                                            <span class="review-stars"><x-star-rating :rating="$review->rating" /></span>
                                            <span class="review-date">{{ $review->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="review-comment">
                                            {{ $review->comment }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="review-pagination">{{ $reviews->withQueryString()->links() }}</div>
                        @else
                            <p class="text-muted">Belum ada review untuk produk ini. Jadilah yang pertama memberikan review!</p>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    </section>

    <!-- Related Products Section -->
    <section class="related-products-section">
    <div class="container">
        <h3>You Might Also Like</h3>
        <div class="related-products-grid">

            {{-- Lakukan perulangan pada data produk random yang sudah kita ambil --}}
            @foreach ($relatedProducts as $relatedProduct)
                @php
                    // Ambil varian pertama untuk menampilkan harga
                    $firstVariant = $relatedProduct->variants->first();
                @endphp
            
                <div class="product-card">
                    <div class="product-image set-bg" data-setbg="{{ asset($relatedProduct->primaryImage?->image_path ?? $relatedProduct->images->first()?->image_path) }}">
                        <a href="{{ route('product.details', $relatedProduct->id) }}">
                            <img src="{{ asset($relatedProduct->primaryImage?->image_path ?? $relatedProduct->images->first()?->image_path) }}" alt="{{ $relatedProduct->name }}">
                        </a>
                    </div>
                    <div class="product-content">
                        <h6 class="product-title">
                            <a href="{{ route('product.details', $relatedProduct->id) }}">
                                {{ $relatedProduct->name }}
                            </a>
                        </h6>
                        <h5 class="product-price">
                            Rp{{ number_format($firstVariant?->price ?? 0, 0, ',', '.') }}
                        </h5>
                    </div>
                </div>
            @endforeach

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

    <script src="https://cdn.jsdelivr.net/npm/basiclightbox@5.0.4/dist/basicLightbox.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // JavaScript untuk Header (Disalin dari shop2.html)
            const profileIconContainer = document.getElementById('profileIconContainer');
            const profileDropdownMenu = document.getElementById('profileDropdownMenu');

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
                        window.location.href = 'shop2?search=' + encodeURIComponent(query);
                    }
                });
            });

            // Product Details Page Specific JavaScript
            const mainProductImg = document.getElementById('mainProductImg');
            const thumbnails = document.querySelectorAll('.thumbnail-item img');
            const colorOptions = document.querySelectorAll('.color-option-detail');
            const quantityInput = document.getElementById('quantity');
            const quantityMinus = document.querySelector('.quantity-minus');
            const quantityPlus = document.querySelector('.quantity-plus');

            // Thumbnail click to change main image
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function () {
                    if (mainProductImg) mainProductImg.src = this.src;
                    thumbnails.forEach(t => t.parentElement.classList.remove('active'));
                    this.parentElement.classList.add('active');
                });
            });

            // Main image click for lightbox (using basicLightbox)
            if (mainProductImg && typeof basicLightbox !== 'undefined') {
                mainProductImg.addEventListener('click', () => {
                    basicLightbox.create(`
                        <img src="${mainProductImg.src}" style="max-width: 90vw; max-height: 90vh;">
                    `).show();
                });
            }


            // Color option selection
            colorOptions.forEach(option => {
                option.addEventListener('click', function () {
                    colorOptions.forEach(o => o.classList.remove('active'));
                    this.classList.add('active');
                    console.log('Selected color:', this.dataset.color);
                    // Anda bisa menambahkan logika untuk mengubah gambar utama berdasarkan warna di sini
                });
            });

            // Quantity selector
            if (quantityMinus && quantityPlus && quantityInput) {
                quantityMinus.addEventListener('click', function () {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                });
                quantityPlus.addEventListener('click', function () {
                    let currentValue = parseInt(quantityInput.value);
                    quantityInput.value = currentValue + 1;
                });
            }

            // Add to Cart button
            const addToCartDetailBtn = document.querySelector('.add-to-cart-detail-btn');
            if (addToCartDetailBtn) {
                addToCartDetailBtn.addEventListener('click', function () {
                    const selectedColorEl = document.querySelector('.color-option-detail.active');
                    const selectedSizeEl = document.querySelector('.size-option.active');
                    const quantity = quantityInput ? quantityInput.value : 1;
                    const productName = document.getElementById('productName') ? document.getElementById('productName').textContent : 'Product';

                    let message = `${productName} (Qty: ${quantity}`;
                    if (selectedColorEl) message += `, Color: ${selectedColorEl.dataset.color}`;
                    if (selectedSizeEl) message += `, Size: ${selectedSizeEl.textContent}`;
                    message += `) added to cart!`;
                    alert(message);
                    // Implementasi logika add to cart di sini
                });
            }

            // Function untuk load product data
            
            // Ambil product ID dari URL (misalnya, product-details.html?product=workaholic-tee)
            const urlParams = new URLSearchParams(window.location.search);
            const productIdFromUrl = urlParams.get('product');

            if (productIdFromUrl) {
                loadProductDetails(productIdFromUrl);
            } else {
                // Jika tidak ada ID produk, muat produk default atau tampilkan error
                console.warn('No product ID found in URL. Loading default or showing error.');
                loadProductDetails("workaholic-tee"); // Muat produk default sebagai contoh
            }


            // Set background untuk related products
            document.querySelectorAll('.related-products-grid .set-bg').forEach(function (element) {
                const bg = element.getAttribute('data-setbg');
                if (bg) {
                    element.style.backgroundImage = `url('${bg}')`;
                }
            });


            if (mainProductImg && typeof basicLightbox !== 'undefined') {
                mainProductImg.addEventListener('click', () => {
                    const instance = basicLightbox.create(`
            <div style="padding: 20px; display: flex; justify-content: center; align-items: center; height: 100%;">
                <img src="${mainProductImg.src}" style="max-width: 90%; max-height: 90%; object-fit: contain;">
            </div>
        `, {
                        onShow: () => {
                            document.body.style.overflow = 'hidden';
                        },
                        onClose: () => {
                            document.body.style.overflow = '';
                        }
                    });
                    instance.show();
                });
            }


            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (mainProductImg) {
                        mainProductImg.src = this.src;
                        mainProductImg.alt = this.alt;

                        mainProductImg.style.opacity = '0.5';
                        setTimeout(() => {
                            mainProductImg.style.opacity = '1';
                        }, 150);
                    }


                    document.querySelectorAll('.thumbnail-item').forEach(item => {
                        item.classList.remove('active');
                    });
                    this.parentElement.classList.add('active');

                    this.parentElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest',
                        inline: 'center'
                    });
                });
            });


            colorOptions.forEach(option => {
                option.addEventListener('click', function () {
                    colorOptions.forEach(o => o.classList.remove('active'));
                    this.classList.add('active');


                    const colorName = this.dataset.color.toLowerCase();
                    const newImageSrc = mainProductImg.src.replace(/(BLACK|WHITE|BLUE)/i, colorName.toUpperCase())
                    fetch(newImageSrc, { method: 'HEAD' })
                        .then(res => {
                            if (res.ok) {
                                mainProductImg.src = newImageSrc;
                                mainProductImg.style.opacity = '0.5';
                                setTimeout(() => {
                                    mainProductImg.style.opacity = '1';
                                }, 150);
                            }
                        })
                        .catch(() => {
                            console.log('Image not found for selected color');
                        });
                });
            });

            if (addToCartDetailBtn) {
                addToCartDetailBtn.addEventListener('click', function () {

                    this.classList.add('btn-pulse');


                    setTimeout(() => {
                        this.classList.remove('btn-pulse');
                    }, 300);

                });
            }

            // Tambahkan script wishlist toggle
            var btn = document.querySelector('.btn-wishlist-toggle');
            if (btn) {
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
            }

            // Tab menu logic (tanpa bentrok Bootstrap)
            const tabBtns = document.querySelectorAll('.product-tabs .tab-btn');
            const tabPanes = document.querySelectorAll('.product-tabs .tab-pane');
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    tabBtns.forEach(b => b.classList.remove('active'));
                    tabPanes.forEach(p => p.classList.remove('active'));
                    this.classList.add('active');
                    const target = document.getElementById('tab-' + this.dataset.tab);
                    if(target) target.classList.add('active');
                });
            });

            // Jika ada JS untuk update size/variant, tambahkan update input variant_id juga
            const sizeOptions = document.querySelectorAll('.size-option');
            const variantIdInputCheckout = document.getElementById('selectedVariantIdInputCheckout');
            if (sizeOptions && variantIdInputCheckout) {
                sizeOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        const variantId = this.getAttribute('data-variant-id');
                        if (variantId) {
                            variantIdInputCheckout.value = variantId;
                        }
                    });
                });
            }

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