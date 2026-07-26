<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Detail Produk">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Detail Produk, Minimalist">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk - DariMata Studio</title>
     <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/png">
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

        /* ====== REVIEW SECTION STYLES ====== */

        /* Alert messages */
        .review-alert { display: flex; align-items: center; gap: 10px; padding: 14px 18px; border-radius: 10px; margin-bottom: 20px; font-size: 0.97rem; font-weight: 500; }
        .review-alert-success { background: #e8f7ee; color: #1a7a42; border: 1px solid #b2e3c5; }
        .review-alert-error   { background: #fdf0f0; color: #c0392b; border: 1px solid #f5c6c6; }

        /* Rating Overview */
        .review-overview { display: flex; gap: 32px; align-items: center; background: #f8f9ff; border-radius: 14px; padding: 24px 28px; margin-bottom: 28px; border: 1px solid #e8eaff; }
        .review-avg-block { text-align: center; min-width: 110px; }
        .review-avg-score { font-size: 3.5rem; font-weight: 800; color: #0118d8; line-height: 1; }
        .review-avg-stars { color: #f5a623; font-size: 1.2rem; margin: 6px 0 4px; letter-spacing: 2px; }
        .review-avg-count { font-size: 0.82rem; color: #888; margin-top: 2px; }
        .review-bars { flex: 1; }
        .review-bar-row { display: flex; align-items: center; gap: 10px; margin-bottom: 7px; }
        .review-bar-label { min-width: 38px; font-size: 0.85rem; color: #555; font-weight: 600; text-align: right; }
        .review-bar-track { flex: 1; height: 8px; background: #e5e7ef; border-radius: 99px; overflow: hidden; }
        .review-bar-fill { height: 100%; background: linear-gradient(90deg, #f5a623, #f7c948); border-radius: 99px; transition: width 0.6s cubic-bezier(.4,0,.2,1); }
        .review-bar-count { min-width: 22px; font-size: 0.82rem; color: #888; }
        @media (max-width: 600px) { .review-overview { flex-direction: column; gap: 18px; padding: 18px 16px; } }

        /* Already reviewed */
        .review-already-done { background: #f4f7ff; border: 1px solid #c7d3f9; border-radius: 10px; padding: 14px 18px; display: flex; align-items: center; flex-wrap: wrap; gap: 8px; font-size: 0.96rem; color: #444; margin-bottom: 20px; }
        .review-badge-pending  { background: #fff3cd; color: #856404; border-radius: 6px; padding: 2px 10px; font-size: 0.78rem; font-weight: 700; }
        .review-badge-approved { background: #d1fae5; color: #065f46; border-radius: 6px; padding: 2px 10px; font-size: 0.78rem; font-weight: 700; }
        .review-badge-rejected { background: #fee2e2; color: #991b1b; border-radius: 6px; padding: 2px 10px; font-size: 0.78rem; font-weight: 700; }
        .btn-review-delete { background: none; border: 1px solid #e53637; color: #e53637; border-radius: 6px; padding: 3px 10px; font-size: 0.8rem; cursor: pointer; transition: all 0.2s; }
        .btn-review-delete:hover { background: #e53637; color: #fff; }

        /* Review Form */
        .review-form-wrapper { background: #fff; border: 1.5px solid #e0e5ff; border-radius: 14px; padding: 24px 28px; margin-bottom: 28px; box-shadow: 0 4px 18px rgba(1,24,216,0.05); }
        .review-form-title { font-size: 1.1rem; font-weight: 700; color: #0118d8; margin-bottom: 18px; display: flex; align-items: center; gap: 8px; }

        /* Star Picker */
        .star-rating-input { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
        .star-rating-label { font-weight: 600; color: #444; font-size: 0.95rem; min-width: 54px; }
        .star-picker { display: flex; gap: 6px; }
        .star-pick { font-size: 1.8rem; color: #ddd; cursor: pointer; transition: color 0.15s, transform 0.15s; }
        .star-pick:hover, .star-pick.hovered, .star-pick.selected { color: #f5a623; }
        .star-pick:hover { transform: scale(1.18); }
        .star-rating-hint { font-size: 0.85rem; color: #888; font-style: italic; }

        /* Textarea */
        .review-textarea-wrap { position: relative; margin-bottom: 14px; }
        .review-textarea { width: 100%; border: 1.5px solid #e0e0e0; border-radius: 10px; padding: 12px 14px; font-size: 0.96rem; font-family: inherit; resize: vertical; transition: border-color 0.2s; color: #333; min-height: 100px; }
        .review-textarea:focus { outline: none; border-color: #0118d8; box-shadow: 0 0 0 3px rgba(1,24,216,0.08); }
        .review-char-count { position: absolute; bottom: 10px; right: 14px; font-size: 0.78rem; color: #bbb; }
        .review-field-error { color: #e53637; font-size: 0.84rem; margin-top: -10px; margin-bottom: 10px; }

        /* Submit button */
        .btn-submit-review { display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #0118d8 0%, #2d3fd9 100%); color: #fff; border: none; border-radius: 10px; padding: 12px 28px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.25s; box-shadow: 0 4px 14px rgba(1,24,216,0.18); }
        .btn-submit-review:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(1,24,216,0.28); }
        .btn-submit-review:disabled { opacity: 0.5; cursor: not-allowed; transform: none; box-shadow: none; }

        /* Locked message */
        .review-locked { background: #f9f9f9; border: 1px solid #eee; border-radius: 10px; padding: 14px 20px; color: #888; font-size: 0.95rem; display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }

        /* Review List Header */
        .review-list-header { border-bottom: 2px solid #f0f0f0; padding-bottom: 10px; margin-bottom: 18px; }
        .review-list-title { font-size: 1rem; font-weight: 700; color: #333; }

        /* Review Items */
        .modern-reviews-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 18px; }
        .review-item { display: flex; gap: 16px; padding: 18px; background: #fafbff; border: 1px solid #edf0ff; border-radius: 12px; transition: box-shadow 0.2s; }
        .review-item:hover { box-shadow: 0 4px 16px rgba(1,24,216,0.07); }
        .review-avatar { width: 44px; height: 44px; min-width: 44px; border-radius: 50%; background: linear-gradient(135deg, #0118d8 0%, #4f7cef 100%); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.1rem; font-weight: 700; }
        .review-body { flex: 1; }
        .review-header { display: flex; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 8px; }
        .review-user { font-weight: 700; color: #222; font-size: 0.97rem; }
        .review-stars-row { color: #f5a623; font-size: 0.92rem; letter-spacing: 1px; }
        .review-date { font-size: 0.8rem; color: #bbb; margin-left: auto; }
        .review-comment { font-size: 0.95rem; color: #555; line-height: 1.6; }
        .review-empty { text-align: center; padding: 32px 0; color: #aaa; font-size: 0.97rem; }
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
    @if ($product)
        
   
    <section class="product-details-section">
        <div class="container">
            <div class="product-details-grid">
                <div class="product-gallery">
                    <div class="main-product-image">
                        @php
                        $mainImage = $product->primaryImage?->image_path ?? $product->images->first()?->image_path;
                        @endphp
                        <img src="{{ asset($mainImage) }}" alt="{{ $product->name }}" id="mainProductImg" loading="eager" decoding="async" fetchpriority="high">
                    </div>
                    <div class="product-thumbnails">
                    @foreach($product->images as $image)
                        <div class="thumbnail-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset($image->image_path) }}" alt="Thumbnail {{ $loop->iteration }}" loading="lazy" decoding="async">
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
                                    <span class="size-option {{ $loop->first ? 'active' : '' }} {{ $variant->stock <= 0 ? 'out-of-stock' : '' }}"
                                        data-size="{{ $variant->size }}"
                                        data-variant-id="{{ $variant->id }}"
                                        data-stock="{{ $variant->stock }}"
                                        style="{{ $variant->stock <= 0 ? 'opacity:0.4;cursor:not-allowed;text-decoration:line-through;' : '' }}">
                                        {{ $variant->size }}
                                        @if($variant->stock <= 0)
                                            <small style="font-size:0.7em;display:block;">Habis</small>
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                            <small id="stockInfo" style="color:#888;margin-top:6px;display:block;">Stok tersedia: <strong id="stockCount">{{ $product->variants->first()?->stock ?? 0 }}</strong></small>
                        </div>
                    </div>

                    <div class="quantity-selector">
                        <label class="option-label" for="quantity">Quantity:</label>
                        <div class="quantity-input-group">
                            <button type="button" class="quantity-minus" aria-label="Decrease quantity">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->variants->first()?->stock ?? 1 }}" aria-label="Product quantity" readonly style="width:50px; text-align:center;">
                            <button type="button" class="quantity-plus" aria-label="Increase quantity">+</button>
                        </div>
                        <small id="maxQtyNote" style="color:#e53637;margin-left:10px;display:none;">Maksimal <span id="maxQtyVal"></span> item</small>
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
                    <button class="tab-btn active" id="tab-btn-desc" data-tab="tab-desc">Description</button>
                    <button class="tab-btn" id="tab-btn-spec" data-tab="tab-spec">Specification</button>
                    <button class="tab-btn" id="tab-btn-rev" data-tab="tab-rev">Reviews ({{ $reviews->count() }})</button>
                </div>
                <div class="tab-content-area">
                    {{-- === TAB: DESCRIPTION === --}}
                    <div class="tab-pane active" id="tab-desc">
                        <div class="desc-title">Product Description</div>
                        <div class="desc-main">{{$product['description']}}</div>
                        <div class="desc-title" style="font-size:1.1rem; margin-top:1.5em;">Fitur Utama:</div>
                        <ul class="desc-features">
                            <li>Bahan: 100% Katun Premium Combed 24s</li>
                            <li>Potongan: Boxy Fit (oversized, bahu turun)</li>
                            <li>Sablon: Plastisol Ink, tahan lama dan tidak mudah pecah</li>
                            <li>Jahitan: Rapi dan kuat</li>
                            <li>Cocok untuk: Pria &amp; Wanita (Unisex)</li>
                        </ul>
                    </div>

                    {{-- === TAB: SPECIFICATION === --}}
                    <div class="tab-pane" id="tab-spec">
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

                    {{-- === TAB: REVIEWS === --}}
                    <div class="tab-pane" id="tab-rev">

                        {{-- ===== FLASH MESSAGE ===== --}}
                        @if(session('review_success'))
                            <div class="review-alert review-alert-success">
                                <i class="fas fa-check-circle"></i> {{ session('review_success') }}
                            </div>
                        @endif
                        @if(session('review_error'))
                            <div class="review-alert review-alert-error">
                                <i class="fas fa-exclamation-circle"></i> {{ session('review_error') }}
                            </div>
                        @endif

                        {{-- ===== RATING OVERVIEW ===== --}}
                        <div class="review-overview">
                            <div class="review-avg-block">
                                <div class="review-avg-score">{{ $avgRating > 0 ? number_format($avgRating, 1) : '-' }}</div>
                                <div class="review-avg-stars">
                                    @for($s = 1; $s <= 5; $s++)
                                        <i class="{{ $s <= round($avgRating) ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                                <div class="review-avg-count">{{ $totalApproved }} ulasan terverifikasi</div>
                            </div>
                            <div class="review-bars">
                                @for($i = 5; $i >= 1; $i--)
                                    <div class="review-bar-row">
                                        <span class="review-bar-label">{{ $i }} <i class="fas fa-star" style="color:#f5a623;font-size:0.75rem;"></i></span>
                                        <div class="review-bar-track">
                                            <div class="review-bar-fill" style="width: {{ $ratingStats[$i]['percent'] ?? 0 }};"></div>
                                        </div>
                                        <span class="review-bar-count">{{ $ratingStats[$i]['count'] ?? 0 }}</span>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        {{-- ===== FORM SUBMIT ULASAN ===== --}}
                        @auth
                            @if($userReview)
                                <div class="review-already-done">
                                    <i class="fas fa-star" style="color:#f5a623;"></i>
                                    Anda sudah memberikan ulasan
                                    @for($s=1;$s<=5;$s++)<i class="{{ $s <= $userReview->rating ? 'fas' : 'far' }} fa-star" style="color:#f5a623;font-size:0.9rem;"></i>@endfor
                                    untuk produk ini.
                                    @if($userReview->status === 'Pending')
                                        <span class="review-badge-pending">Menunggu Moderasi</span>
                                    @elseif($userReview->status === 'Approved')
                                        <span class="review-badge-approved">Terverifikasi</span>
                                    @else
                                        <span class="review-badge-rejected">Tidak Disetujui</span>
                                    @endif
                                    <form action="{{ route('reviews.destroy', $userReview->id) }}" method="POST" style="display:inline;margin-left:10px;" onsubmit="return confirm('Hapus ulasan Anda?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-review-delete"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </form>
                                </div>
                            @elseif($canReview)
                                <div class="review-form-wrapper">
                                    <h4 class="review-form-title"><i class="fas fa-pen-nib"></i> Tulis Ulasan Anda</h4>
                                    <form action="{{ route('reviews.store') }}" method="POST" id="reviewForm">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="star-rating-input" id="starRatingInput">
                                            <span class="star-rating-label">Rating:</span>
                                            <div class="star-picker" id="starPicker">
                                                @for($s = 1; $s <= 5; $s++)
                                                    <i class="far fa-star star-pick" data-value="{{ $s }}" id="star-pick-{{ $s }}"></i>
                                                @endfor
                                            </div>
                                            <span class="star-rating-hint" id="starHint">Pilih bintang</span>
                                        </div>
                                        <input type="hidden" name="rating" id="ratingInput" value="">
                                        @error('rating')<div class="review-field-error">{{ $message }}</div>@enderror
                                        <div class="review-textarea-wrap">
                                            <textarea name="comment" id="reviewComment" class="review-textarea" placeholder="Ceritakan pengalaman Anda dengan produk ini... (opsional)" rows="4" maxlength="1000"></textarea>
                                            <span class="review-char-count"><span id="charCount">0</span>/1000</span>
                                        </div>
                                        @error('comment')<div class="review-field-error">{{ $message }}</div>@enderror
                                        <button type="submit" class="btn-submit-review" id="submitReviewBtn" disabled>
                                            <i class="fas fa-paper-plane"></i> Kirim Ulasan
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="review-locked">
                                    <i class="fas fa-lock"></i>
                                    Hanya pembeli yang telah menerima pesanan yang dapat memberikan ulasan.
                                    <a href="{{ route('shop2') }}" style="color:var(--primary-color);margin-left:4px;">Belanja sekarang</a>
                                </div>
                            @endif
                        @else
                            <div class="review-locked">
                                <i class="fas fa-user-circle"></i>
                                <a href="{{ route('login') }}" style="color:var(--primary-color);">Login</a> untuk memberikan ulasan.
                            </div>
                        @endauth

                        {{-- ===== DAFTAR ULASAN ===== --}}
                        <div class="review-list-header">
                            <span class="review-list-title">Semua Ulasan ({{ $totalApproved }})</span>
                        </div>
                        @if($reviews->count())
                            <ul class="modern-reviews-list">
                                @foreach($reviews as $review)
                                    <li class="review-item">
                                        <div class="review-avatar">
                                            <span>{{ strtoupper(substr($review->user?->first_name ?? 'U', 0, 1)) }}</span>
                                        </div>
                                        <div class="review-body">
                                            <div class="review-header">
                                                <span class="review-user">{{ $review->user?->first_name ?? 'User' }}</span>
                                                <span class="review-stars-row">
                                                    @for($s=1;$s<=5;$s++)
                                                        <i class="{{ $s <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                                    @endfor
                                                </span>
                                                <span class="review-date">{{ $review->created_at->format('d M Y') }}</span>
                                            </div>
                                            @if($review->comment)
                                                <div class="review-comment">{{ $review->comment }}</div>
                                            @else
                                                <div class="review-comment" style="color:#aaa;font-style:italic;">Tidak ada komentar.</div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="review-pagination">{{ $reviews->withQueryString()->links() }}</div>
                        @else
                            <div class="review-empty">
                                <i class="far fa-comment-dots fa-2x" style="color:#ddd;margin-bottom:8px;display:block;"></i>
                                Belum ada ulasan terverifikasi. Jadilah yang pertama!
                            </div>
                        @endif
                    </div>
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
                            <img src="{{ asset($relatedProduct->primaryImage?->image_path ?? $relatedProduct->images->first()?->image_path) }}" alt="{{ $relatedProduct->name }}" loading="lazy" decoding="async">
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

    @include('partials.footer')

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

            // Quantity selector dengan max stok
            if (quantityMinus && quantityPlus && quantityInput) {
                quantityMinus.addEventListener('click', function () {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                        syncQtyToForms();
                    }
                });
                quantityPlus.addEventListener('click', function () {
                    let currentValue = parseInt(quantityInput.value);
                    let maxStock = parseInt(quantityInput.max) || 1;
                    if (currentValue < maxStock) {
                        quantityInput.value = currentValue + 1;
                        syncQtyToForms();
                    } else {
                        const note = document.getElementById('maxQtyNote');
                        const maxVal = document.getElementById('maxQtyVal');
                        if (note && maxVal) {
                            maxVal.textContent = maxStock;
                            note.style.display = 'inline';
                            setTimeout(() => { note.style.display = 'none'; }, 2000);
                        }
                    }
                });
            }

            function syncQtyToForms() {
                const qty = quantityInput ? quantityInput.value : 1;
                const qtyInput = document.getElementById('selectedQtyInput');
                const qtyInputCheckout = document.getElementById('selectedQtyInputCheckout');
                if (qtyInput) qtyInput.value = qty;
                if (qtyInputCheckout) qtyInputCheckout.value = qty;
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

            // Size pilih: update variant_id, stok max, reset qty
            const sizeOptions = document.querySelectorAll('.size-option');
            const variantIdInputCheckout = document.getElementById('selectedVariantIdInputCheckout');
            const selectedSizeInput = document.getElementById('selectedSizeInput');
            const selectedSizeInputCheckout = document.getElementById('selectedSizeInputCheckout');
            const stockCount = document.getElementById('stockCount');
            const addToCartBtn = document.querySelector('#addToCartForm button[type="submit"]');
            const checkoutBtn = document.querySelector('#checkoutForm button[type="submit"]');

            if (sizeOptions) {
                sizeOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        // Jangan proses kalau stok habis
                        if (this.classList.contains('out-of-stock')) return;

                        sizeOptions.forEach(o => o.classList.remove('active'));
                        this.classList.add('active');

                        const variantId = this.getAttribute('data-variant-id');
                        const size = this.getAttribute('data-size');
                        const stock = parseInt(this.getAttribute('data-stock')) || 0;

                        // Update hidden inputs
                        if (variantIdInputCheckout) variantIdInputCheckout.value = variantId;
                        if (selectedSizeInput) selectedSizeInput.value = size;
                        if (selectedSizeInputCheckout) selectedSizeInputCheckout.value = size;

                        // Update max quantity & reset ke 1
                        if (quantityInput) {
                            quantityInput.max = stock;
                            quantityInput.value = stock > 0 ? 1 : 0;
                            syncQtyToForms();
                        }

                        // Update tampilan stok
                        if (stockCount) stockCount.textContent = stock;

                        // Disable/enable tombol cart & checkout berdasar stok
                        const outOfStock = stock <= 0;
                        if (addToCartBtn) addToCartBtn.disabled = outOfStock;
                        if (checkoutBtn) checkoutBtn.disabled = outOfStock;
                    });
                });
            }

            // Init: cek stok varian pertama saat load
            const firstSize = document.querySelector('.size-option.active');
            if (firstSize) {
                const initStock = parseInt(firstSize.getAttribute('data-stock')) || 0;
                if (quantityInput) quantityInput.max = initStock;
                if (stockCount) stockCount.textContent = initStock;
                const outOfStock = initStock <= 0;
                if (addToCartBtn) addToCartBtn.disabled = outOfStock;
                if (checkoutBtn) checkoutBtn.disabled = outOfStock;
            }

        });
    </script>

    {{-- ===== PRODUCT TABS JS (Client-Side) ===== --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabBtns = document.querySelectorAll('.product-tabs .tab-btn');
        const tabPanes = document.querySelectorAll('.product-tabs .tab-pane');

        tabBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const targetId = this.getAttribute('data-tab');

                // Remove active from all buttons
                tabBtns.forEach(function (b) { b.classList.remove('active'); });
                // Remove active from all panes
                tabPanes.forEach(function (p) { p.classList.remove('active'); });

                // Activate clicked button and target pane
                this.classList.add('active');
                const targetPane = document.getElementById(targetId);
                if (targetPane) { targetPane.classList.add('active'); }
            });
        });

        // Auto-open Reviews tab if there's a flash message for reviews
        @if(session('review_success') || session('review_error'))
            const revBtn = document.getElementById('tab-btn-rev');
            if (revBtn) { revBtn.click(); }
        @endif
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

    {{-- ===== REVIEW STAR PICKER JS ===== --}}
    <script>
    (function() {
        const starPicker = document.getElementById('starPicker');
        const ratingInput = document.getElementById('ratingInput');
        const starHint = document.getElementById('starHint');
        const submitBtn = document.getElementById('submitReviewBtn');
        const reviewComment = document.getElementById('reviewComment');
        const charCount = document.getElementById('charCount');

        const hintTexts = ['', 'Sangat Buruk 😞', 'Buruk 😕', 'Cukup 😐', 'Bagus 😊', 'Sangat Bagus 🤩'];
        let selectedRating = 0;

        if (starPicker) {
            const stars = starPicker.querySelectorAll('.star-pick');

            function updateStars(upTo, type) {
                stars.forEach((s, idx) => {
                    const val = parseInt(s.dataset.value);
                    if (type === 'hover') {
                        s.classList.toggle('hovered', val <= upTo);
                        s.classList.remove('selected');
                        s.className = s.className.replace(/\bfas\b/, 'far').replace(/\bfar\b/, 'far');
                        if (val <= upTo) {
                            s.classList.remove('far'); s.classList.add('fas');
                        } else {
                            s.classList.remove('fas'); s.classList.add('far');
                        }
                    } else if (type === 'select') {
                        s.classList.remove('hovered');
                        s.classList.toggle('selected', val <= upTo);
                        if (val <= upTo) {
                            s.classList.remove('far'); s.classList.add('fas');
                        } else {
                            s.classList.remove('fas'); s.classList.add('far');
                        }
                    } else { // reset hover → back to selected
                        s.classList.remove('hovered');
                        if (val <= selectedRating) {
                            s.classList.remove('far'); s.classList.add('fas');
                            s.classList.add('selected');
                        } else {
                            s.classList.remove('fas'); s.classList.add('far');
                            s.classList.remove('selected');
                        }
                    }
                });
            }

            stars.forEach(star => {
                star.addEventListener('mouseenter', function() {
                    updateStars(parseInt(this.dataset.value), 'hover');
                    if (starHint) starHint.textContent = hintTexts[parseInt(this.dataset.value)] || '';
                });
                star.addEventListener('mouseleave', function() {
                    updateStars(selectedRating, 'reset');
                    if (starHint) starHint.textContent = selectedRating ? hintTexts[selectedRating] : 'Pilih bintang';
                });
                star.addEventListener('click', function() {
                    selectedRating = parseInt(this.dataset.value);
                    if (ratingInput) ratingInput.value = selectedRating;
                    updateStars(selectedRating, 'select');
                    if (starHint) starHint.textContent = hintTexts[selectedRating];
                    if (submitBtn) submitBtn.disabled = false;
                });
            });
        }

        // Character counter for textarea
        if (reviewComment && charCount) {
            reviewComment.addEventListener('input', function() {
                charCount.textContent = this.value.length;
                charCount.style.color = this.value.length >= 950 ? '#e53637' : '#bbb';
            });
        }
    })();
    </script>
</body>

</html>