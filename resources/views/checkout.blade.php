<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Checkout Pesanan Anda">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Checkout, Pembayaran">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout - DariMata Studio</title>

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

    <style>
        :root {
            --checkout-spacing: 30px;
            --checkout-card-radius: 12px;
            --checkout-card-padding: 25px;
            --checkout-section-padding: 60px 0;
        }

        /* Checkout Page Styles */
        .checkout-section {
            padding: var(--checkout-section-padding);
            background-color: #f9fafb;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 4px;
        }

        .section-title p {
            color: var(--text-light-color);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: var(--checkout-spacing);
        }

        .checkout-form-container,
        .order-summary-container {
            background-color: white;
            padding: var(--checkout-card-padding);
            border-radius: var(--checkout-card-radius);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .checkout-form-container:hover,
        .order-summary-container:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .checkout-form-container h3,
        .order-summary-container h3 {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        .checkout-form-container h3::after,
        .order-summary-container h3::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h4 {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-color);
            display: flex;
            align-items: center;
        }

        .form-section h4 i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        /* Customer Info Section */
        .customer-info-summary {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 20px;
            background-color: rgba(1, 24, 216, 0.03);
            border-radius: 8px;
            border: 1px solid rgba(1, 24, 216, 0.1);
            margin-bottom: 20px;
        }

        .customer-info-row {
            display: flex;
            align-items: flex-start;
        }

        .customer-info-label {
            font-weight: 600;
            min-width: 120px;
            color: var(--text-light-color);
        }

        .customer-info-value {
            flex: 1;
        }

        /* Address Card */
        .address-card-checkout {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: var(--transition);
            position: relative;
            background-color: white;
        }

        .address-card-checkout:hover {
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .address-card-checkout h5 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .address-card-checkout h5 .badge {
            font-size: 0.75rem;
            padding: 4px 8px;
            background: var(--primary-color);
            color: white;
            border-radius: 4px;
        }

        .address-card-checkout p {
            font-size: 0.9rem;
            color: var(--text-color);
            margin-bottom: 5px;
            line-height: 1.5;
        }

        .address-card-checkout p strong {
            color: var(--text-color);
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .payment-method-option {
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            background-color: white;
        }

        .payment-method-option.selected,
        .payment-method-option:hover {
            border-color: var(--primary-color);
            background-color: rgba(1, 24, 216, 0.03);
        }

        .payment-method-option input[type="radio"] {
            margin-right: 12px;
            width: 1.1em;
            height: 1.1em;
            accent-color: var(--primary-color);
        }

        .payment-method-option img {
            height: 24px;
            margin-right: 12px;
            object-fit: contain;
        }

        .payment-method-option label {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0;
            cursor: pointer;
            flex-grow: 1;
        }

        /* Order Summary Items */
        .order-summary-items {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .order-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .order-item-image img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 15px;
            border: 1px solid var(--border-color);
        }

        .order-item-details {
            flex-grow: 1;
        }

        .order-item-name {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .order-item-meta {
            font-size: 0.85rem;
            color: var(--text-light-color);
            margin-bottom: 5px;
        }

        .order-item-qty {
            font-size: 0.85rem;
            color: var(--text-light-color);
        }

        .order-item-price {
            font-weight: 700;
            font-size: 0.95rem;
            margin-left: auto;
            color: var(--text-color);
        }

        /* Coupon Code Section */
        .coupon-section {
            margin: 25px 0;
        }

        .coupon-form {
            display: flex;
            gap: 10px;
        }

        .coupon-form .form-control {
            flex: 1;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .coupon-form .btn {
            padding: 12px 20px;
            border-radius: 8px;
        }

        .coupon-message {
            margin-top: 10px;
            font-size: 0.9rem;
            padding: 8px 12px;
            border-radius: 6px;
            display: none;
        }

        .coupon-message.success {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            display: block;
        }

        .coupon-message.error {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            display: block;
        }

        /* Order Summary Totals */
        .order-summary-totals {
            margin-top: 20px;
        }

        .order-summary-totals table {
            width: 100%;
            font-size: 0.95rem;
        }

        .order-summary-totals th,
        .order-summary-totals td {
            padding: 10px 0;
            vertical-align: middle;
        }

        .order-summary-totals th {
            text-align: left;
            font-weight: 500;
            color: var(--text-light-color);
        }

        .order-summary-totals td {
            text-align: right;
            font-weight: 600;
            color: var(--text-color);
        }

        .order-summary-totals .grand-total th,
        .order-summary-totals .grand-total td {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary-color);
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }

        /* Place Order Button */
        .btn-place-order {
            width: 100%;
            padding: 16px;
            font-size: 1.1rem;
            font-weight: 700;
            border-radius: 8px;
            margin-top: 20px;
            background: var(--primary-color);
            border: none;
            box-shadow: 0 4px 15px rgba(1, 24, 216, 0.2);
            transition: all 0.3s ease;
        }

        .btn-place-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(1, 24, 216, 0.3);
        }

        /* Responsive Checkout */
        @media (max-width: 1199px) {
            :root {
                --checkout-spacing: 25px;
                --checkout-card-padding: 20px;
            }
        }

        @media (max-width: 991px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .order-summary-container {
                margin-top: var(--checkout-spacing);
            }

            :root {
                --checkout-section-padding: 40px 0;
            }
        }

        @media (max-width: 767px) {
            :root {
                --checkout-card-padding: 18px;
                --checkout-spacing: 20px;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }

            .customer-info-row {
                flex-direction: column;
                gap: 5px;
            }

            .customer-info-label {
                min-width: auto;
            }

            .coupon-form {
                flex-direction: column;
            }
        }

        @media (max-width: 575px) {
            :root {
                --checkout-card-padding: 15px;
            }

            .section-title h2 {
                font-size: 1.6rem;
            }

            .order-item {
                flex-wrap: wrap;
            }

            .order-item-price {
                margin-left: 85px;
                margin-top: 5px;
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
                    <a href="cart" style="color: var(--text-light-color);">Shopping Cart</a>
                    <span style="margin: 0 8px; color: var(--text-light-color);">/</span>
                    <span style="color: var(--text-color); font-weight: 500;">Checkout</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout Section -->
    <section class="checkout-section">
        <div class="container">
            <div class="section-title">
                <h2>Checkout</h2>
            </div>

            <form id="checkoutForm" method="POST" action="{{ route('checkout.process') }}">
                @csrf
                <div class="checkout-grid">
                    <div class="checkout-form-container">
                         @if ($errors->any())
                            <div style="padding: 15px; margin-bottom: 20px; border: 1px solid #f5c6cb; border-radius: 8px; background-color: #f8d7da; color: #721c24;">
                                <strong style="display: block; font-size: 1.1rem; margin-bottom: 5px;">Oops! Ada yang salah:</strong>
                                <ul style="margin: 0; padding-left: 20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Customer Information -->
                        <div class="form-section">
                            <h4><i class="fas fa-user-circle"></i> Customer Information</h4>
                            <div class="customer-info-summary">
                                <div class="customer-info-row">
                                    <span class="customer-info-label">Name:</span>
                                    <span class="customer-info-value">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                </div>
                                <div class="customer-info-row">
                                    <span class="customer-info-label">Email:</span>
                                    <span class="customer-info-value">{{ Auth::user()->email }}</span>
                                </div>
                                <div class="customer-info-row">
                                    <span class="customer-info-label">Phone:</span>
                                    <span class="customer-info-value">{{ Auth::user()->phone_number }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Address -->
                       <div class="form-section">
                            <h4><i class="fas fa-map-marker-alt"></i> Shipping Address</h4>
                            
                            {{-- Ganti blok alamat Anda dengan ini --}}
                            @if($addresses && count($addresses) > 0)
                                <div class="shipping-address-list" style="display:flex; flex-direction:column; gap:14px;">
                                    @foreach($addresses as $address)
                                        <label class="address-modern-card" style="display:flex; align-items:flex-start; gap:14px; padding:18px 20px; border:1.5px solid #e5e7eb; border-radius:10px; background:#fcfcfd; cursor:pointer; transition:box-shadow 0.2s, border-color 0.2s; position:relative; box-shadow:0 2px 8px rgba(1,24,216,0.03);">
                                            <input type="radio" name="address_id" value="{{ $address->id }}" {{ $address->is_default ? 'checked' : '' }} required style="accent-color:#0118d8; width:1.2em; height:1.2em; margin-top:2px; margin-right:16px;">
                                            <div style="flex:1;">
                                                <div style="font-size:1.08em; font-weight:700; color:#222; margin-bottom:2px; display:flex; align-items:center; gap:8px;">
                                                    {{ $address->address_name }}
                                                    @if($address->is_default)
                                                        <span style="background:#0118d8; color:#fff; font-size:0.78em; font-weight:600; border-radius:6px; padding:2px 10px; margin-left:6px; letter-spacing:0.5px;">Default</span>
                                                    @endif
                                                </div>
                                                <div style="font-size:0.97em; color:#555; line-height:1.5;">{{ $address->full_address }}, {{ $address->city }}, {{ $address->province }}, {{ $address->postal_code }}</div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            @else
                                <div style="padding: 20px; text-align: center; border: 1.5px dashed #e5e7eb; border-radius: 10px; background-color: #f9fafb;">
                                    <p style="margin: 0; font-weight: 500; color: #555;">Anda belum memiliki alamat pengiriman.</p>
                                    <a href="{{ route('user-profile') }}" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background-color: #0118d8; color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">
                                        + Tambah Alamat
                                    </a>
                                </div>
                            @endif
                            
                        </div>

                        <!-- Courier Selection -->
                        <div class="form-section">
                            <h4><i class="fas fa-truck"></i> Pilih Kurir</h4>
                            @php
                                $courierPrices = [
                                    'jne' => 18000,
                                    'jnt' => 18000,
                                    'sicepat' => 18000,
                                ];
                            @endphp
                            @foreach($couriers as $courier)
                                <div class="payment-method-option" style="margin:14px 0; padding:18px 18px; align-items:center; min-height:54px;">
                                    <input type="radio" id="courier_{{ $courier['code'] }}" name="courier" value="{{ $courier['code'] }}" {{ $loop->first ? 'checked' : '' }} required>
                                    <label for="courier_{{ $courier['code'] }}" style="flex:1; font-size:1.08em; font-weight:600; color:#222; display:flex; align-items:center; gap:10px;">
                                        {{ $courier['name'] }}
                                        <span style="font-size:0.98em; color:#0118d8; font-weight:700; margin-left:10px; background:#f3f6ff; border-radius:6px; padding:3px 12px;">
                                            Rp{{ number_format($courierPrices[$courier['code']] ?? 0, 0, ',', '.') }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Payment Method (dummy, for now) -->
                        <div class="form-section">
                            <h4><i class="fas fa-credit-card"></i> Payment Method</h4>
                            <div class="payment-methods">
                                <div class="payment-method-option selected">
                                    <input type="radio" id="paymentBCA" name="paymentMethod" value="bca" checked>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA">
                                    <label for="paymentBCA">BCA Virtual Account</label>
                                </div>
                                <div class="payment-method-option">
                                    <input type="radio" id="paymentGoPay" name="paymentMethod" value="gopay">
                                    <img src="img/gopay.png" alt="GoPay" style="background:#fff; border-radius:4px; padding:2px; height:24px;">
                                    <label for="paymentGoPay">GoPay</label>
                                </div>
                                <div class="payment-method-option">
                                    <input type="radio" id="paymentDANA" name="paymentMethod" value="dana">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="DANA">
                                    <label for="paymentDANA">DANA</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-summary-container">
                        <h3>Order Summary</h3>
                        <div class="order-summary-items" id="checkoutOrderItems">
                            @foreach($items as $item)
                                <div class="order-item">
                                    <div class="order-item-image">
                                        <img src="{{ $item['product']->primaryImage ? asset($item['product']->primaryImage->image_path) : asset('img/product-placeholder.png') }}" alt="{{ $item['product']->name }}">
                                    </div>
                                    <div class="order-item-details">
                                        <div class="order-item-name">{{ $item['product']->name }}</div>
                                        <div class="order-item-meta">
                                            @if($item['variant']->size) Size: {{ $item['variant']->size }} @endif
                                            @if($item['variant']->color_name) | Color: {{ $item['variant']->color_name }} @endif
                                        </div>
                                        <div class="order-item-qty">Qty: {{ $item['quantity'] }}</div>
                                    </div>
                                    <div class="order-item-price">Rp{{ number_format($item['variant']->sale_price ?? $item['variant']->price, 0, ',', '.') }}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="order-summary-totals">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td id="orderSubtotal">
                                            Rp{{ number_format(collect($items)->sum(function($item) { return ($item['variant']->sale_price ?? $item['variant']->price) * $item['quantity']; }), 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td id="orderShipping">Rp18,000</td>
                                    </tr>
                                    <tr class="grand-total">
                                        <th>Total</th>
                                        <td id="orderTotal">
                                            Rp{{ number_format(collect($items)->sum(function($item) { return ($item['variant']->sale_price ?? $item['variant']->price) * $item['quantity']; }) + 18000, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary btn-place-order">
                            <i class="fas fa-lock" style="margin-right: 8px;"></i> Pay Now
                        </button>
                    </div>
                </div>
            </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
            const currentYearSpan = document.getElementById('currentYearFooter');
            if (currentYearSpan) { currentYearSpan.textContent = new Date().getFullYear(); }
            const searchForms = document.querySelectorAll('.header-search');
            searchForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const query = form.querySelector('input[type="search"]').value;
                    if (query.trim() !== '') { window.location.href = 'shop2?search=' + encodeURIComponent(query); }
                });
            });

            // Payment method selection
            const paymentMethodOptions = document.querySelectorAll('.payment-method-option');
            paymentMethodOptions.forEach(option => {
                option.addEventListener('click', function () {
                    paymentMethodOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    const radioInput = this.querySelector('input[type="radio"]');
                    if (radioInput) radioInput.checked = true;
                });
            });

            // Initialize the page
            loadAndDisplayUserDefaultData();
            loadCartDataForCheckout();
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
document.addEventListener('DOMContentLoaded', function() {
    const courierRadios = document.querySelectorAll('input[name="courier"]');
    const shippingPrices = { 'jne': 18000, 'jnt': 18000, 'sicepat': 18000 };
    const shippingTd = document.getElementById('orderShipping');
    const totalTd = document.getElementById('orderTotal');
    const subtotalTd = document.getElementById('orderSubtotal');
    function parseRupiah(str) {
        return parseInt(str.replace(/[^\d]/g, '')) || 0;
    }
    function formatRupiah(num) {
        return 'Rp' + num.toLocaleString('id-ID');
    }
    function updateShippingAndTotal() {
        const checked = document.querySelector('input[name="courier"]:checked');
        const code = checked ? checked.value : 'jne';
        const shipping = shippingPrices[code] || 0;
        const subtotal = parseRupiah(subtotalTd.textContent);
        shippingTd.textContent = formatRupiah(shipping);
        totalTd.textContent = formatRupiah(subtotal + shipping);
    }
    courierRadios.forEach(radio => {
        radio.addEventListener('change', updateShippingAndTotal);
    });
    updateShippingAndTotal();
});
</script>
</body>

</html>