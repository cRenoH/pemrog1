<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Wishlist Anda">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Wishlist, Daftar Keinginan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist - DariMata Studio</title>
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">



    <style>
        /* Wishlist Page Styles */
        .wishlist-section {
            padding: 40px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-color);
        }

        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .wishlist-item {
            background-color: var(--background-color);
            border-radius: 8px;
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .wishlist-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .wishlist-item-image {
            height: 280px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .wishlist-item-remove {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            color: var(--secondary-color);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .wishlist-item-remove:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .wishlist-item-content {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .wishlist-item-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .wishlist-item-title a {
            color: inherit;
        }

        .wishlist-item-title a:hover {
            color: var(--primary-color);
        }

        .wishlist-item-price {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
            margin-top: auto;
            /* Dorong harga dan tombol ke bawah */
        }

        .wishlist-item-actions .btn {
            width: 100%;
            font-size: 0.85rem;
            padding: 10px 15px;
        }

        .empty-wishlist-message {
            text-align: center;
            padding: 40px 20px;
            background-color: var(--background-color);
            border-radius: 8px;
            box-shadow: var(--box-shadow);
        }

        .empty-wishlist-message i {
            font-size: 3rem;
            color: var(--text-light-color);
            margin-bottom: 20px;
        }

        .empty-wishlist-message h4 {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .empty-wishlist-message p {
            color: var(--text-light-color);
            margin-bottom: 20px;
        }

        /* Responsive Wishlist */
        @media (max-width: 767px) {
            .wishlist-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }

            .wishlist-item-image {
                height: 220px;
            }
        }

        @media (max-width: 575px) {
            .wishlist-grid {
                grid-template-columns: 1fr;
                /* Satu kolom di mobile kecil */
            }

            .wishlist-item-image {
                height: 250px;
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
                    <span style="color: var(--text-color); font-weight: 500;">Wishlist</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Wishlist Section -->
    <section class="wishlist-section">
        <div class="container">
            <div class="section-title">
                <h2>Your Wishlist</h2>
            </div>

            <div id="wishlistGridContent" class="wishlist-grid">
                @if($wishlist && $wishlist->count())
                    @foreach($wishlist as $item)
                        @php $product = $item->product; $firstVariant = $product->variants->first(); @endphp
                        @php $isWishlisted = in_array($product->id, $wishlistProductIds ?? []); @endphp
                        <div class="wishlist-item">
                            <div class="wishlist-item-image" style="background-image: url('{{ asset($product->primaryImage?->image_path ?? $product->images->first()?->image_path) }}');">
                                @if($isWishlisted)
                                    <form action="/wishlist/remove" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="wishlist-item-remove btn-wishlist-toggle active" aria-label="Remove from Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="/wishlist/add" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="wishlist-item-remove btn-wishlist-toggle" aria-label="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <div class="wishlist-item-content">
                                <div class="wishlist-item-title">
                                    <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                </div>
                                <div class="wishlist-item-price">
                                    @if($firstVariant)
                                        Rp{{ number_format($firstVariant->price, 0, ',', '.') }}
                                    @else
                                        <span style="color:#888;">Varian tidak tersedia</span>
                                    @endif
                                </div>
                                <div class="wishlist-item-actions">
                                    <form action="/checkout" method="GET" style="display:inline;">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="variant_id" value="{{ $firstVariant?->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" class="btn-checkout">Checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-wishlist-message" style="grid-column: 1 / -1;">
                        <i class="far fa-heart"></i>
                        <h4>Your wishlist is empty.</h4>
                        <p>Add some of your favorite products to your wishlist!</p>
                        <a href="shop2" class="btn btn-primary">Explore Products</a>
                    </div>
                @endif
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
            // Muat wishlist saat halaman dimuat
            renderWishlist();
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
    document.querySelectorAll('.btn-wishlist-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            var url = '/wishlist/remove';
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
                    // Remove the wishlist item from the DOM
                    this.closest('.wishlist-item').remove();
                } else if (data.error === 'Unauthorized') {
                    window.location.href = '/login';
                }
            });
        });
    });
});
</script>
</body>

</html>