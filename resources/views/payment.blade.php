<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Halaman Pembayaran">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Pembayaran, Payment">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment - DariMata Studio</title>

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
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png" type="image/png">

    <style>
        /* Payment Page Specific Styles - Disesuaikan dengan struktur checkout */
        .payment-section {
            /* Mengganti .payment */
            padding: 40px 0;
        }

        .section-title {
            /* Menggunakan .section-title dari checkout */
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-color);
        }

        .payment-grid {
            /* Mirip .checkout-grid */
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .payment-main-container,
        .payment-summary-container {
            /* Mirip .checkout-form-container & .order-summary-container */
            background-color: var(--background-color);
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .payment-main-container h3,
        .payment-summary-container h3 {
            /* Mirip h3 di checkout */
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
        }


        .payment__status {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: var(--border-radius);
        }

        .payment__status.pending {
            background-color: rgba(255, 193, 7, 0.1);
            border: 1px solid var(--warning-color);
        }

        .payment__status.success {
            background-color: rgba(40, 167, 69, 0.1);
            border: 1px solid var(--success-color);
        }

        .payment__status.failed {
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid var(--danger-color);
        }

        .payment__status .icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .payment__status.pending .icon {
            color: var(--warning-color);
        }

        .payment__status.success .icon {
            color: var(--success-color);
        }

        .payment__status.failed .icon {
            color: var(--danger-color);
        }

        .payment__status h4 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .payment__status p {
            color: var(--text-light-color);
            margin-bottom: 0;
        }

        .payment-details-group {
            /* Untuk mengelompokkan detail seperti metode, akun, instruksi */
            margin-bottom: 25px;
        }

        .payment-details-group h5 {
            /* Sub-judul dalam payment-main-container */
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
            color: var(--text-color);
        }

        .payment-details-group img {
            /* Gambar dalam payment__qr */
            max-width: 100%;
            height: auto;
            justify-content: center;
            border-radius: var(--border-radius);
        }


        .payment__timer {
            text-align: center;
            margin-bottom: 30px;
        }

        .payment__timer .timer-title {
            font-weight: 600;
            color: var(--text-light-color);
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .payment__timer .timer-countdown {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .payment__timer .timer-unit {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 60px;
        }

        .payment__timer .timer-value {
            background-color: var(--primary-color);
            color: #fff;
            border-radius: var(--border-radius);
            padding: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            width: 100%;
            text-align: center;
        }

        .payment__timer .timer-label {
            font-size: 0.75rem;
            color: var(--text-light-color);
            margin-top: 5px;
        }

        .payment__timer .timer-separator {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            align-self: center;
            padding-bottom: 1.2rem;
            /* Adjust to align with value boxes */
        }

        .payment__account {
            background-color: rgba(1, 24, 216, 0.03);
            border-radius: var(--border-radius);
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
        }

        .payment__account .account-info {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-size: 0.9rem;
        }

        .payment__account .account-info:last-child {
            margin-bottom: 0;
        }

        .payment__account .account-info .label {
            width: 120px;
            font-weight: 600;
            color: var(--text-light-color);
        }

        .payment__account .account-info .value {
            flex: 1;
            font-weight: 600;
            color: var(--text-color);
            display: flex;
            align-items: center;
        }

        .payment__account .account-info .value img[alt="BCA"] {
            height: 24px;
            width: auto;
            object-fit: contain;
            margin-right: 8px;
        }

        .payment__account .account-info .copy-btn {
            background: none;
            border: none;
            color: var(--primary-color);
            cursor: pointer;
            margin-left: 10px;
            transition: var(--transition);
        }

        .payment__account .account-info .copy-btn:hover {
            color: var(--secondary-color);
        }

        .payment__account .account-info .copy-tooltip {
            position: relative;
            display: inline-block;
        }

        .payment__account .account-info .copy-tooltip .tooltiptext {
            visibility: hidden;
            width: 80px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -40px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 12px;
            font-weight: 400;
        }

        .payment__account .account-info .copy-tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #333 transparent transparent transparent;
        }

        .payment__account .account-info .copy-tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .payment__qr {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            text-align: center;
        }

        .payment__qr img {
            max-width: 180px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            justify-content: center;
            padding: 10px;
            background-color: #fff;
        }

        .payment__qr p {
            margin-top: 10px;
            color: var(--text-light-color);
            font-size: 0.85rem;
        }

        .payment__instructions .instruction-step {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed var(--border-color);
            font-size: 0.9rem;
        }

        .payment__instructions .instruction-step:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .payment__instructions .instruction-step .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            background-color: var(--primary-color);
            color: #fff;
            border-radius: 50%;
            font-weight: 700;
            font-size: 0.8rem;
            margin-right: 8px;
            float: left;
        }

        .payment__instructions .instruction-step h6 {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 5px;
            margin-left: 32px;
            /* Space for number */
        }

        .payment__instructions .instruction-step p {
            margin-top: 5px;
            margin-bottom: 0;
            color: var(--text-light-color);
            padding-left: 32px;
            /* Space for number */
            font-size: 0.85rem;
            line-height: 1.5;
        }

        .payment__actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .payment__actions .btn-primary {
            background-color: var(--primary-color);
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            transform: translateY(5px);
            text-transform: uppercase;
        }

        .payment__actions .btn-primary:hover {
            background-color: var(--btn-hover-color);
            transform: translateY(0);
        }

        /* Order Summary in Payment Page (Mirip .order-summary-totals di checkout) */
        .payment-summary-container .payment-order-details table {
            width: 100%;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .payment-summary-container .payment-order-details th,
        .payment-summary-container .payment-order-details td {
            padding: 8px 0;
            vertical-align: top;
        }

        .payment-summary-container .payment-order-details th {
            text-align: left;
            font-weight: normal;
            color: var(--text-light-color);
            width: 40%;
        }

        .payment-summary-container .payment-order-details td {
            text-align: right;
            font-weight: 600;
            color: var(--text-color);
        }

        .payment-summary-container .payment-order-details .grand-total th,
        .payment-summary-container .payment-order-details .grand-total td {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary-color);
            padding-top: 10px;
            border-top: 1px solid var(--border-color);
        }

        .payment-summary-container .shipping-details-summary p {
            font-size: 0.85rem;
            color: var(--text-light-color);
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .payment-summary-container .shipping-details-summary p strong {
            color: var(--text-color);
        }


        .payment__notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            max-width: 350px;
            background-color: #fff;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.5s ease;
        }

        .payment__notification.show {
            transform: translateX(0);
            opacity: 1;
        }

        .payment__notification .notification-header {
            padding: 12px 15px;
            background-color: var(--success-color);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .payment__notification .notification-header h6 {
            margin-bottom: 0;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .payment__notification .notification-header .close-btn {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
            opacity: 0.8;
        }

        .payment__notification .notification-header .close-btn:hover {
            opacity: 1;
        }

        .payment__notification .notification-body {
            padding: 15px;
            font-size: 0.9rem;
        }

        .payment__notification .notification-body p {
            margin-bottom: 0;
            color: var(--text-light-color);
        }

        .payment__notification .notification-progress {
            height: 4px;
            background-color: #e9ecef;
            width: 100%;
        }

        .payment__notification .notification-progress-bar {
            height: 100%;
            background-color: var(--success-color);
            width: 100%;
            transition: width 5s linear;
        }

        .payment__notification.show .notification-progress-bar {
            width: 0;
        }


        /* Responsive Payment Page */
        @media (max-width: 991px) {
            .payment-grid {
                grid-template-columns: 1fr;
                /* Satu kolom di tablet */
            }

            .payment-summary-container {
                margin-top: 30px;
            }
        }

        @media (max-width: 767px) {

            .payment-main-container,
            .payment-summary-container {
                padding: 20px;
            }

            .payment__timer .timer-unit {
                min-width: 50px;
            }

            .payment__timer .timer-value {
                font-size: 1.2rem;
                padding: 8px;
            }

            .payment__timer .timer-separator {
                font-size: 1.2rem;
                padding-bottom: 1rem;
            }

            .payment__actions {
                flex-direction: column;
                gap: 15px;
            }

            .payment__actions .btn {
                width: 100%;
            }
        }


        /* Footer Styles (Sama seperti checkout.html) */
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
            color: #ffffff;
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
            color: #ffff;
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
    </style>
</head>

<body>
    <!-- Header (Disalin dari checkout.html) -->
    @include('partials.header')

    <!-- Mobile Navigation (Disalin dari checkout) -->
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
            <li><a href="user-profile#orders-tab">Order History</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

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
                    <a href="checkout" style="color: var(--text-light-color);">Checkout</a>
                    <span style="margin: 0 8px; color: var(--text-light-color);">/</span>
                    <span style="color: var(--text-color);">Payment</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Section (Struktur disesuaikan dengan checkout) -->
    <section class="payment-section">
        <div class="container">
            <div class="section-title">
                <h2>Payment Confirmation</h2>
                <p style="color: var(--text-light-color); font-size: 1rem; max-width: 600px; margin: 10px auto 0;">
                    Please complete your payment using the details below.
                </p>
            </div>

            <div class="payment-grid">
                <div class="payment-main-container">
                    <div class="payment__status pending" id="paymentStatus">
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>Waiting for Payment</h4>
                        <p>Please complete your payment before the time expires.</p>
                    </div>

                    <div class="payment__timer">
                        <div class="timer-title">Payment Time Remaining</div>
                        <div class="timer-countdown" id="paymentTimer">
                            <div class="timer-unit">
                                <div class="timer-value" id="hours">23</div>
                                <div class="timer-label">Hours</div>
                            </div>
                            <div class="timer-separator">:</div>
                            <div class="timer-unit">
                                <div class="timer-value" id="minutes">59</div>
                                <div class="timer-label">Minutes</div>
                            </div>
                            <div class="timer-separator">:</div>
                            <div class="timer-unit">
                                <div class="timer-value" id="seconds">59</div>
                                <div class="timer-label">Seconds</div>
                            </div>
                        </div>
                    </div>

                    <div class="payment-details-group">
                        <h5>Payment Method: {{ strtoupper($paymentMethod) }}</h5>
                        <div class="payment__account">
                            <div class="account-info">
                                <div class="label">Bank</div>
                                <div class="value">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA">
                                    Bank Central Asia (BCA)
                                </div>
                            </div>
                            <div class="account-info">
                                <div class="label">Account Number</div>
                                <div class="value">
                                    <span id="accountNumber">8690123456</span>
                                    <div class="copy-tooltip">
                                        <button class="copy-btn" data-clipboard-target="#accountNumber" aria-label="Copy account number">
                                            <i class="far fa-copy"></i>
                                        </button>
                                        <span class="tooltiptext" id="accountTooltip">Copy</span>
                                    </div>
                                </div>
                            </div>
                            <div class="account-info">
                                <div class="label">Account Name</div>
                                <div class="value">PT. DARI MATA STUDIO</div>
                            </div>
                            <div class="account-info">
                                <div class="label">Amount</div>
                                <div class="value">
                                    <span id="paymentAmount">
                                        Rp{{ number_format(collect($items)->sum(function($item) { return ($item['variant']->sale_price ?? $item['variant']->price) * $item['quantity']; }) + 18000, 0, ',', '.') }}
                                    </span>
                                    <div class="copy-tooltip">
                                        <button class="copy-btn" data-clipboard-target="#paymentAmount" aria-label="Copy payment amount">
                                            <i class="far fa-copy"></i>
                                        </button>
                                        <span class="tooltiptext" id="amountTooltip">Copy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="payment-details-group">
                        <h5>Payment QR Code</h5>
                        <div class="payment__qr">
                            <img src="{{ asset('img/HEHE.jpeg') }}" alt="Payment QR Code">
                            <p>Scan this QR code with your banking app to pay.</p>
                        </div>
                    </div>

                    <div class="payment-details-group">
                        <h5>Payment Instructions</h5>
                        <div class="payment__instructions">
                            <div class="instruction-step">
                                <span class="step-number">1</span>
                                <h6>Log in to your banking app</h6>
                                <p>Open your banking app and log in with your credentials.</p>
                            </div>
                            <div class="instruction-step">
                                <span class="step-number">2</span>
                                <h6>Select Transfer Menu</h6>
                                <p>Tap on "Transfer" and select the destination bank.</p>
                            </div>
                            <div class="instruction-step">
                                <span class="step-number">3</span>
                                <h6>Enter Account Details</h6>
                                <p>Enter the account number <strong>8690123456</strong> and the amount <strong>Rp{{ number_format(collect($items)->sum(function($item) { return ($item['variant']->sale_price ?? $item['variant']->price) * $item['quantity']; }) + 18000, 0, ',', '.') }}</strong>.</p>
                            </div>
                            <div class="instruction-step">
                                <span class="step-number">4</span>
                                <h6>Confirm and Complete</h6>
                                <p>Review the details, confirm the transfer, and enter your PIN to complete the payment.</p>
                            </div>
                            <div class="instruction-step">
                                <span class="step-number">5</span>
                                <h6>Confirm Your Payment</h6>
                                <p>After completing the payment, click the "I've Made Payment" button below to confirm.</p>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('payment.process') }}" class="payment__actions">
                        @csrf
                        <a href="{{ route('checkout') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left" style="margin-right: 5px;"></i> Back to Checkout
                        </a>
                        <button id="confirmPaymentBtn" class="btn btn-primary">
                            <i class="fas fa-check" style="margin-right: 5px;"></i> I've Made Payment
                        </button>
                    </form>
                </div>

                <div class="payment-summary-container">
                    <h3>Order Summary</h3>
                    <div class="payment-order-details">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Items</th>
                                    <td>{{ count($items) }} item{{ count($items) > 1 ? 's' : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>Rp{{ number_format(collect($items)->sum(function($item) { return ($item['variant']->sale_price ?? $item['variant']->price) * $item['quantity']; }), 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Rp18.000</td>
                                </tr>
                                <tr class="grand-total">
                                    <th>Total</th>
                                    <td>Rp{{ number_format(collect($items)->sum(function($item) { return ($item['variant']->sale_price ?? $item['variant']->price) * $item['quantity']; }) + 18000, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 style="margin-top: 30px;">Shipping Details</h3>
                    <div class="shipping-details-summary">
                        <p><strong>{{ $address->address_name }}</strong></p>
                        <p>{{ $address->full_address }}, {{ $address->city }}, {{ $address->province }}, {{ $address->postal_code }}</p>
                        <p>Phone: {{ Auth::user()->phone_number }}</p>
                        <p>Shipping Method: {{ strtoupper($courier) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Notification -->
    <div class="payment__notification" id="paymentNotification">
        <div class="notification-header">
            <h6><i class="fas fa-check-circle" style="margin-right: 5px;"></i> Payment Successful</h6>
            <button class="close-btn" id="closeNotification" aria-label="Close notification"><i
                    class="fas fa-times"></i></button>
        </div>
        <div class="notification-body">
            <p>Your payment has been successfully processed. Thank you for your purchase!</p>
        </div>
        <div class="notification-progress">
            <div class="notification-progress-bar"></div>
        </div>
    </div>

    <!-- Footer (Sama seperti checkout) -->
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

    <!-- JS Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // JavaScript untuk Header (Disalin dari checkout.html)
            const profileIconContainer = document.getElementById('profileIconContainer');
            const profileDropdownMenu = document.getElementById('profileDropdownMenu');
            if (profileIconContainer && profileDropdownMenu) {
                profileIconContainer.addEventListener('click', function (event) { event.stopPropagation(); profileDropdownMenu.classList.toggle('active'); });
                document.addEventListener('click', function (event) { if (profileIconContainer && !profileIconContainer.contains(event.target) && profileDropdownMenu && !profileDropdownMenu.contains(event.target)) { profileDropdownMenu.classList.remove('active'); } });
            }
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
                    if (query.trim() !== '') { window.location.href = 'shop2?search=' + encodeURIComponent(query); }
                });
            });

            const headerCartCountPaymentEl = document.getElementById('headerCartCountPayment');
            function updateHeaderCartCountPayment() {
                // Simulasi atau ambil dari localStorage jika ada
                const storedCart = localStorage.getItem('shoppingCart');
                let totalItems = 0;
                if (storedCart) {
                    try {
                        const cartData = JSON.parse(storedCart);
                        cartData.forEach(item => {
                            totalItems += (Number(item.quantity) || 0);
                        });
                    } catch (e) { console.error("Error parsing cart for header count:", e); }
                } else {
                    // Contoh jika tidak ada cart di local storage
                    totalItems = 3; // Sesuai contoh di HTML awal
                }
                if (headerCartCountPaymentEl) headerCartCountPaymentEl.textContent = totalItems;
            }
            updateHeaderCartCountPayment();


            // Payment Page Specific JavaScript
            const orderDateEl = document.getElementById('orderDate');
            if (orderDateEl) {
                const today = new Date();
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                orderDateEl.textContent = today.toLocaleDateString('id-ID', options); // Menggunakan locale Indonesia
            }

            // Initialize countdown timer
            let hours = 23;
            let minutes = 59;
            let seconds = 59;
            const hoursEl = document.getElementById('hours');
            const minutesEl = document.getElementById('minutes');
            const secondsEl = document.getElementById('seconds');
            const paymentStatusEl = document.getElementById('paymentStatus');
            const paymentTimerEl = document.getElementById('paymentTimer');


            function updateTimerDisplay() {
                if (hoursEl) hoursEl.textContent = hours.toString().padStart(2, '0');
                if (minutesEl) minutesEl.textContent = minutes.toString().padStart(2, '0');
                if (secondsEl) secondsEl.textContent = seconds.toString().padStart(2, '0');
            }

            function countdown() {
                seconds--;
                if (seconds < 0) {
                    seconds = 59;
                    minutes--;
                    if (minutes < 0) {
                        minutes = 59;
                        hours--;
                        if (hours < 0) {
                            clearInterval(timerInterval);
                            if (paymentStatusEl && paymentTimerEl) {
                                paymentTimerEl.innerHTML = '<p style="color: var(--danger-color); font-weight: 600;">Time Expired</p>';
                                paymentStatusEl.className = 'payment__status failed';
                                paymentStatusEl.innerHTML = `
                                    <div class="icon"><i class="fas fa-times-circle"></i></div>
                                    <h4>Payment Expired</h4>
                                    <p>The payment time has expired. Please try again or contact support.</p>`;
                                const confirmBtn = document.getElementById('confirmPaymentBtn');
                                if (confirmBtn) confirmBtn.disabled = true;
                            }
                            return;
                        }
                    }
                }
                updateTimerDisplay();
            }

            if (hoursEl && minutesEl && secondsEl) { // Pastikan elemen ada sebelum memulai timer
                updateTimerDisplay(); // Initial display
                var timerInterval = setInterval(countdown, 1000);
            }


            // Initialize clipboard.js
            if (typeof ClipboardJS !== 'undefined') {
                const clipboard = new ClipboardJS('.copy-btn');
                clipboard.on('success', function (e) {
                    const tooltip = e.trigger.parentElement.querySelector('.tooltiptext');
                    if (tooltip) {
                        tooltip.textContent = 'Copied!';
                        setTimeout(function () {
                            tooltip.textContent = 'Copy';
                        }, 2000);
                    }
                    e.clearSelection();
                });
                clipboard.on('error', function (e) {
                    const tooltip = e.trigger.parentElement.querySelector('.tooltiptext');
                    if (tooltip) {
                        tooltip.textContent = 'Failed!';
                        setTimeout(function () {
                            tooltip.textContent = 'Copy';
                        }, 2000);
                    }
                });
            }


            // Handle notification
            const notificationEl = document.getElementById('paymentNotification');
            const closeNotificationBtn = document.getElementById('closeNotification');
            let notificationTimeout;

            function showNotification(title, message) {
                if (notificationEl) {
                    const titleEl = notificationEl.querySelector('.notification-header h6');
                    const messageEl = notificationEl.querySelector('.notification-body p');
                    const progressBar = notificationEl.querySelector('.notification-progress-bar');

                    if (titleEl) titleEl.innerHTML = `<i class="fas fa-check-circle" style="margin-right: 5px;"></i> ${title}`;
                    if (messageEl) messageEl.textContent = message;

                    notificationEl.classList.add('show');
                    if (progressBar) progressBar.style.width = '100%'; // Reset progress bar

                    // Start animation for progress bar
                    setTimeout(() => {
                        if (progressBar) progressBar.style.width = '0%';
                    }, 100);


                    clearTimeout(notificationTimeout);
                    notificationTimeout = setTimeout(hideNotification, 5000);
                }
            }

            function hideNotification() {
                if (notificationEl) {
                    notificationEl.classList.remove('show');
                }
            }

            if (closeNotificationBtn) {
                closeNotificationBtn.addEventListener('click', hideNotification);
            }
        });
    </script>
</body>

</html>