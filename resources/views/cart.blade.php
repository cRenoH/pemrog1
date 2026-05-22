<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Keranjang Belanja Anda">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Keranjang Belanja, Cart">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang Belanja - DariMata Studio</title>

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
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" style="background:none; border:none; padding:0; cursor:pointer;" title="Remove item">
                                    <i class="fas fa-trash-alt" style="color: #dc3545;"></i>
                                </button>
                            </form>
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

</body>