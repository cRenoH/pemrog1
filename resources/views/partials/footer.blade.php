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
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="#">Shipping &amp; Returns</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Size Guide</a></li>
                </ul>
            </div>
            <div class="footer-widget">
                <h5>Newsletter</h5>
                <p>Subscribe to our newsletter for the latest updates and promotions.</p>
                {{-- Form ini menggunakan JS preventDefault agar tidak memicu 405 Method Not Allowed --}}
                <form id="newsletterForm" style="display: flex; margin-top: 10px;" onsubmit="handleNewsletterSubmit(event)">
                    <input type="email" name="email" id="newsletterEmail" placeholder="Your Email" required
                        style="flex-grow: 1; padding: 8px; border: 1px solid rgba(255,255,255,0.2); border-radius: 3px 0 0 3px; background: rgba(255,255,255,0.1); color: #fff;">
                    <button type="submit" class="btn"
                        style="border-radius: 0 3px 3px 0; padding: 8px 12px; background: #fff; color: var(--primary-color); text-transform: capitalize; font-weight: 600;">Subscribe</button>
                </form>
                <p id="newsletterMsg" style="display:none; margin-top:8px; font-size:0.88rem; color:#aaffaa;">
                    Terima kasih! Email Anda telah terdaftar.
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <span id="currentYearFooter"></span> DariMata Studio. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script>
function handleNewsletterSubmit(e) {
    e.preventDefault();
    var email = document.getElementById('newsletterEmail');
    var msg = document.getElementById('newsletterMsg');
    if (email && email.value) {
        if (msg) { msg.style.display = 'block'; }
        if (email) { email.value = ''; }
    }
}
// Update footer year
(function() {
    var el = document.getElementById('currentYearFooter');
    if (el) { el.textContent = new Date().getFullYear(); }
})();
</script>
