<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Keranjang Belanja Anda">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Keranjang Belanja, Cart">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang Belanja - DariMata Studio</title>
     <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
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
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Styling untuk Keranjang Belanja Baru */
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
        .cart-container, .cart-summary {
            background-color: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .cart-header, .cart-item {
            display: grid;
            grid-template-columns: 2.5fr 1.5fr 1fr 0.5fr 1fr 0.5fr;
            gap: 15px;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-header {
            color: #6c757d;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .product-details {
            display: flex;
            align-items: center;
        }

        .product-details img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
        }

        .product-details span {
            font-weight: 600;
        }

        .variant-details {
            display: flex;
            flex-direction: column;
            font-size: 0.9rem;
            color: #495057;
        }

        .price, .subtotal, .quantity {
            font-size: 1rem;
        }

        .text-center { text-align: center; }
        .text-end { text-align: right; }

        .cart-summary-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .cart-summary {
            width: 100%;
            max-width: 1170px;
        }

        .cart-summary h4 {
            margin-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 10px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .summary-row span:first-child {
            color: #6c757d;
        }

        .summary-row span:last-child {
            font-weight: 600;
        }

        .btn-checkout-final {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: background-color 0.2s;
        }

        .btn-checkout-final:hover {
            background-color: #0012b3;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(1, 24, 216, 0.2);
        }

        .fa-trash-alt {
            cursor: pointer;
            transition: color 0.2s;
        }

        .fa-trash-alt:hover {
            color: #a02a37 !important;
        }

        /* Quantity Controls */
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .qty-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1.5px solid #dee2e6;
            background: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            color: #333;
            line-height: 1;
            padding: 0;
        }
        .qty-btn:hover {
            background: #0118d8;
            color: #fff;
            border-color: #0118d8;
        }
        .qty-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }
        .qty-value {
            min-width: 28px;
            text-align: center;
            font-weight: 700;
            font-size: 1rem;
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
            <li><a href="user-profilee">My Account</a></li>
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
                    <a href="shop2" style="color: var(--text-light-color);">Shopping Cart</a>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Shopping Cart Section -->
    <section class="shopping-cart-section" style="padding: 60px 0; min-height: 50vh;">
        <div class="container">
            <div class="section-title" style="margin-bottom: 40px; text-align: center;">
                <h2>Your Shopping Cart</h2>
            </div>

            <div class="cart-container">
                {{-- Header Tabel --}}
                <div class="cart-header">
                    <div class="header-item">PRODUCTS</div>
                    <div class="header-item">VARIANTS</div>
                    <div class="header-item">PRICE</div>
                    <div class="header-item text-center">QTY</div>
                    <div class="header-item text-end">SUBTOTAL</div>
                    <div></div>
                </div>

                @php $subtotalGeneral = 0; @endphp

                {{-- Item Keranjang --}}
                @foreach($cartItems as $item)
                    <div class="cart-item">
                        <div class="product-details">
                             <img src="{{ asset($item->productVariant?->product?->primaryImage?->image_path ?? 'img/product-placeholder.png') }}" alt="{{ $item->productVariant->product->name }}">
                            <span>{{ $item->productVariant->product->name }}</span>
                        </div>
                        <div class="variant-details">
                            <span>Warna: {{ $item->productVariant->color_name }}</span>
                            <span>Ukuran: {{ $item->productVariant->size }}</span>
                        </div>
                        <div class="price">Rp{{ number_format($item->productVariant->price) }}</div>
                        <div class="quantity text-center">{{ $item->quantity }}</div>
                        <div class="subtotal text-end">
                            @php
                                $subtotalItem = $item->productVariant->price * $item->quantity;
                                $subtotalGeneral += $subtotalItem;
                            @endphp
                            Rp{{ number_format($subtotalItem) }}
                        </div>
                        <div class="remove-item text-center">
                            <div class="quantity-controls" data-item-id="{{ $item->id }}">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="qty-form">
                                    @csrf
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="qty-btn qty-minus" title="Kurangi">&#8722;</button>
                                </form>
                                <span class="qty-value" id="qty-{{ $item->id }}">{{ $item->quantity }}</span>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="qty-form">
                                    @csrf
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" class="qty-btn qty-plus" title="Tambah">&#43;</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Ringkasan Total --}}
            <div class="cart-summary-wrapper">
                <div class="cart-summary">
                    <h4>Total</h4>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span class="text-end">Rp{{ number_format($subtotalGeneral) }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn-checkout-final">CHECKOUT</a>
                </div>
            </div>
        </div>
    </section>

        @include('partials.footer')

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
            const currentYearSpan = document.getElementById('currentYear');
            if (currentYearSpan) { currentYearSpan.textContent = new Date().getFullYear(); }
            const searchForms = document.querySelectorAll('.header-search');
            searchForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const query = form.querySelector('input[type="search"]').value;
                    if (query.trim() !== '') { window.location.href = 'shop2?search=' + encodeURIComponent(query); }
                });
            });

            // Shopping Cart Page Specific JavaScript
           
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Profile dropdown toggle untuk halaman cart
    const profileTrigger = document.getElementById('profileTrigger');
    const profileDropdown = document.getElementById('profileDropdown');
    
    if (profileTrigger && profileDropdown) {
        profileTrigger.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('show');
            profileTrigger.classList.toggle('active');
        });
        document.addEventListener('click', function(e) {
            if (!profileTrigger.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.remove('show');
                profileTrigger.classList.remove('active');
            }
        });
    }

    // AJAX Quantity Update untuk tombol +/-
    document.querySelectorAll('.qty-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const action = form.querySelector('input[name="action"]').value;
            const controls = form.closest('.quantity-controls');
            const itemId = controls.dataset.itemId;
            const qtySpan = document.getElementById('qty-' + itemId);
            const csrfToken = document.querySelector('meta[name="csrf-token"]');

            if (!csrfToken) {
                // Jika tidak ada CSRF meta, lakukan submit biasa
                form.submit();
                return;
            }

            fetch('{{ url("cart/update") }}/' + itemId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ action: action })
            })
            .then(res => res.json())
            .then(data => {
                if (data.removed) {
                    // Item dihapus karena qty jadi 0 — hapus baris dari DOM
                    const row = controls.closest('.cart-item');
                    if (row) row.remove();
                    // Update subtotal
                    if (data.subtotal !== undefined) {
                        const subtotalEl = document.querySelector('.summary-row .text-end');
                        if (subtotalEl) subtotalEl.textContent = 'Rp' + Number(data.subtotal).toLocaleString('id-ID');
                    }
                } else if (data.quantity !== undefined) {
                    // Update angka quantity
                    qtySpan.textContent = data.quantity;
                    // Update subtotal item jika ada
                    if (data.item_subtotal !== undefined) {
                        const row = controls.closest('.cart-item');
                        if (row) {
                            const subtotalCell = row.querySelector('.subtotal');
                            if (subtotalCell) subtotalCell.textContent = 'Rp' + Number(data.item_subtotal).toLocaleString('id-ID');
                        }
                    }
                    // Update total
                    if (data.subtotal !== undefined) {
                        const subtotalEl = document.querySelector('.summary-row .text-end');
                        if (subtotalEl) subtotalEl.textContent = 'Rp' + Number(data.subtotal).toLocaleString('id-ID');
                    }
                } else if (data.error) {
                    alert(data.error);
                }
            })
            .catch(err => {
                console.error('Cart update error:', err);
                // Fallback: submit form biasa jika AJAX gagal
                form.submit();
            });
        });
    });
});
</script>
</body>

</html>

</body>